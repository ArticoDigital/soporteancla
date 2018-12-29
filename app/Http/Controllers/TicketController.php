<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ServiceCategory;
use App\Models\TicketState;
use App\Notifications\AssignSupport;
use App\Notifications\AssignSupportClient;
use App\Notifications\ChangeStateTicket;
use App\Notifications\CreateTicket;
use App\Notifications\CreateTicketClient;
use App\Notifications\EndedSupport;
use App\User;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Http\Requests\TicketRequest;
use App\Http\Requests\TicketUpdateRequest;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\Category;


class TicketController extends Controller
{
    private $ticket;

    public function index()
    {
        $categories = ServiceCategory::where("isActive", 1);
        return view('create-ticket', compact('categories'));
    }

    public function create()
    {
        $categories = ServiceCategory::where("isActive", 1)->with('subcategories')->get();
        $cities = City::all();
        return view('create-ticket', compact('categories', 'cities'));
    }

    public function store(TicketRequest $request)
    {
        $inputs = $request->all();

        $inputs['ticket_state_id'] = '1';
        if ($request->file('file2')) {
            $path = Storage::putFile('SoporteAncla', $request->file('file2'), 'public');
            $inputs['file2'] = $path;
        }
        $ticket = Ticket::create($inputs);
        Notification::send(User::role('Admin')->where('is_send_mail', 1)->get(), new CreateTicket($ticket));

        $ticket->notify(new CreateTicketClient($ticket));
        return view('ticket-success', compact('ticket'))->with(['messageok' => 'Registro exitoso']);
    }

    public function viewTickets()
    {
        $states = TicketState::all();

        $data['state'] = (auth()->user()->hasRole('Support')) ? 2 : 1;
        $data['dates'] = "";

        $tickets = (auth()->user()->hasRole('Support')) ?
            Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                ->where('ticket_state_id', $data['state'])
                ->where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10) :
            //->get() :
            Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                ->where('ticket_state_id', $data['state'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        //->get();
        $categories = ServiceCategory::all('name','id');
        return view('tickets', compact('states', 'tickets', 'data','categories'));
    }

    public function filterViewTicketsGet(Request $inputs)
    {
        $tickets = Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])->search($inputs);
        $states = TicketState::all();
        $categories = ServiceCategory::all('name','id');
        return view('ticketsget', compact('states', 'tickets', 'inputs','categories'));
    }


    public function show(Ticket $ticket)
    {
        $users = User::role('Support')->where('isActive', 1)->get();
        $ticketStates = TicketState::all();
        $ticket->load(['ticketState', 'ServiceSubcategory', 'user', 'Comments.user', 'city']);
        return view('ticket', compact('ticket', 'users', 'ticketStates'));
    }

    public function update(Request $request, Ticket $ticket)
    {

        if (!isset($request['is_invoiced'])) {
            $request['is_invoiced'] = 0;
            $request['invoice_cost'] = null;
        } else {
            $validatedData = $request->validate([
                'is_invoiced' => 'numeric',
                'invoice_cost' => 'numeric'
            ]);
        }
        $ticket->fill($this->file($request))->save();
        if ($user = $ticket->user) {
            if ($user->id != $request->input('user_id')) {

                $user->notify(new AssignSupport($ticket));

            } else {
                $user->notify(new ChangeStateTicket($ticket, auth()->user()));
                Notification::send(User::role('Admin')->where('is_send_mail', 1)->get(), new ChangeStateTicket($ticket, auth()->user()));
            }
        } else {
            if ($supportUserId = $request->input('user_id')) {
                $supportUser = User::find($supportUserId);
                $supportUser->notify(new AssignSupport($ticket));
                $ticket->notify(new AssignSupportClient($ticket));
            }

            Notification::send(User::role('Admin')->where('is_send_mail', 1)->get(), new ChangeStateTicket($ticket, auth()->user()));
        }

        if ($ticket->ticketState->name == 'Finalizado') {
            $ticket->notify(new EndedSupport($ticket));
        }


        return redirect()->back()->with(['messageok' => 'Ticket actualizado']);
    }

    /**
     * @param $request
     * @return mixed
     */
    private function file($request)
    {
        $inputs = $request->all();
        if ($request->file('file')) {
            $path = Storage::putFile('SoporteAncla', $request->file('file'), 'public');
            $inputs['file'] = $path;
        }
        return $inputs;
    }

}
