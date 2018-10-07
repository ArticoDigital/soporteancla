<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ServiceCategory;
use App\Models\TicketState;
use App\User;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\ServiceSubcategory;
use App\Http\Requests\TicketRequest;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ServiceCategory::all();

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
        $categories = ServiceCategory::with('subcategories')->get();
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
        return view('ticket-success', compact('ticket'))->with(['messageok' => 'Registro exitoso']);
    }

    public function viewTickets()
    {
        $states = TicketState::all();


        $tickets = (auth()->user()->hasRole('Support')) ?
            Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                ->where('ticket_state_id', 2)
                ->where('user_id', auth()->user()->id)->get() :
            Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                ->where('ticket_state_id', 1)->get();

        return view('tickets', compact('states', 'tickets'));
    }

    public function filterviewTickets(Request $inputs)
    {
        $states = TicketState::all();
        if(!empty($inputs['dates'])){
          $datev = explode(" a ", $inputs['dates']);

          if(!isset($datev[1])){
            $datev[1]=$datev[0];
          }
          $tickets = (auth()->user()->hasRole('Support')) ?
              Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                  ->where('ticket_state_id', $inputs['state'])
                  ->where('user_id', auth()->user()->id)
                  ->whereDate('created_at', '>=', $datev[0])
                  ->whereDate('created_at', '<=', $datev[1])->get() :
              Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                  ->where('ticket_state_id', $inputs['state'])
                  ->whereDate('created_at', '>=', $datev[0])
                  ->whereDate('created_at', '<=', $datev[1])
                  ->get();
        }else{
          $tickets = (auth()->user()->hasRole('Support')) ?
              Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                  ->where('ticket_state_id', $inputs['state'])
                  ->where('user_id', auth()->user()->id)
                  ->get() :
              Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                  ->where('ticket_state_id', $inputs['state'])
                  ->get();
        }
        return view('tickets', compact('states', 'tickets'));
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
        $ticket->load(['ticketState', 'ServiceSubcategory', 'user', 'Comments.user','city']);
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

        $ticket->fill($request->all())->save();
        return redirect()->back()->with(['messageok' => 'Registro exitoso del comentario']);
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
}
