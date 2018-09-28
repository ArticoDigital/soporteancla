<?php

namespace App\Http\Controllers;

use App\Models\TicketState;
use App\User;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\ServiceCategory;
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
        //dd('da');
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
        $categories = ServiceCategory::all();
        return view('create-ticket', compact('categories'));
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
        $categories = ServiceCategory::all();


        $tickets = (auth()->user()->hasRole('Support')) ?
            Ticket::with(['ticketState', 'ServiceCategory', 'user'])
                ->where('ticket_state_id', 1)
                ->where('user_id', auth()->user()->id)->get() :
            Ticket::with(['ticketState', 'ServiceCategory', 'user'])
                ->where('ticket_state_id', 1)->get();

        return view('tickets', compact('categories', 'tickets'));
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
        $ticket->load(['ticketState', 'ServiceCategory', 'user', 'Comments.user']);
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
