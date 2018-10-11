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
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ServiceCategory::where("isActive", 1);
        return view('create-ticket', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = ServiceCategory::where("isActive", 1)->with('subcategories')->get();
        $cities = City::all();
        return view('create-ticket', compact('categories', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        //

        $inputs = $request->all();

        $inputs['ticket_state_id'] = '1';
        $ticket = Ticket::create($inputs);
        Notification::send(User::role('Admin')->get(), new CreateTicket($ticket));
        $ticket->notify(new CreateTicketClient($ticket));
        return view('ticket-success', compact('ticket'))->with(['messageok' => 'Registro exitoso']);
    }

    public function viewTickets()
    {
        $states = TicketState::all();
        //  $allstates['states'] =TicketState::where('isActive', '=', 1)->select('id')->get()->toArray();

        //dd($allstates);
        //  TicketState::where('isActive', '=', 1)->select('id')->get()->toArray() :
        $data['state'] = (auth()->user()->hasRole('Support')) ? 2 : 1;
        $data['dates'] = "";

        $tickets = (auth()->user()->hasRole('Support')) ?
            Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                ->where('ticket_state_id', $data['state'])
                ->where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->get() :
            Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                ->where('ticket_state_id', $data['state'])
                ->orderBy('created_at', 'desc')
                ->get();

        return view('tickets', compact('states', 'tickets', 'data'));
    }

    public function filterviewTickets(Request $inputs)
    {
        $states = TicketState::all();
        $data = $inputs->all();
        $inputs['state'] = (empty($inputs['state'])) ?
            TicketState::where('isActive', '=', 1)->select('id')->get()->toArray() :
            [$inputs['state']];
        if (!empty($inputs['dates'])) {
            $datev = explode(" a ", $inputs['dates']);

            if (!isset($datev[1])) {
                $datev[1] = $datev[0];
            }


            $tickets = (auth()->user()->hasRole('Support')) ?
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->where('user_id', auth()->user()->id)
                    ->whereDate('created_at', '>=', $datev[0])
                    ->whereDate('created_at', '<=', $datev[1])
                    ->orderBy('created_at', 'desc')
                    ->get() :
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->whereDate('created_at', '>=', $datev[0])
                    ->whereDate('created_at', '<=', $datev[1])
                    ->orderBy('created_at', 'desc')
                    ->get();
        } else {
            $tickets = (auth()->user()->hasRole('Support')) ?
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->where('user_id', auth()->user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get() :
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->orderBy('created_at', 'desc')
                    ->get();
        }

        return view('tickets', compact('states', 'tickets', 'data'));
    }

    public function filterviewTicketsUser(Request $inputs, User $user)
    {
        //dd($user);
        $states = TicketState::all();
        $data = $inputs->all();
        $inputs['state'] = (empty($inputs['state'])) ?
            TicketState::where('isActive', '=', 1)->select('id')->get()->toArray() :
            [$inputs['state']];
        if (!empty($inputs['dates'])) {
            $datev = explode(" a ", $inputs['dates']);

            if (!isset($datev[1])) {
                $datev[1] = $datev[0];
            }


            $tickets = (auth()->user()->hasRole('Support')) ?
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->where('user_id', auth()->user()->id)
                    ->whereDate('created_at', '>=', $datev[0])
                    ->whereDate('created_at', '<=', $datev[1])->get() :
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->whereDate('created_at', '>=', $datev[0])
                    ->whereDate('created_at', '<=', $datev[1])
                    ->get();
        } else {
            $tickets = (auth()->user()->hasRole('Support')) ?
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->where('user_id', auth()->user()->id)
                    ->get() :
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->get();
        }

        return view('tickets', compact('states', 'tickets', 'data'));
    }

    /**
     * Display the specified resource.
     *
     * @param $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $users = User::role('Support')->get();
        $ticketStates = TicketState::all();
        $ticket->load(['ticketState', 'ServiceSubcategory', 'user', 'Comments.user', 'city']);
        return view('ticket', compact('ticket', 'users', 'ticketStates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $ticket
     * @return back
     */
    public function update(Request $request, Ticket $ticket)
    {

        if ($user = $ticket->user) {
            if ($user->id != $request->input('user_id')) {
                $user->notify(new AssignSupport($ticket));
                $ticket->notify(new AssignSupportClient($ticket));
            } else {
                $user->notify(new ChangeStateTicket($ticket, auth()->user()));
                Notification::send(User::role('Admin')->get(), new ChangeStateTicket($ticket, auth()->user()));
            }
        } else {
            Notification::send(User::role('Admin')->get(), new ChangeStateTicket($ticket, auth()->user()));
        }

        if ($ticket->ticketState->name == 'Finalizado') {
            $ticket->notify(new EndedSupport($ticket));
        }

        $ticket->fill($this->file($request))->save();

        return redirect()->back()->with(['messageok' => 'Ticket actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
