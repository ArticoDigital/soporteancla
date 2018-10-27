<?php

namespace App\Http\Controllers;

use App\Notifications\NewComment;
use App\User;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Ticket;
use App\Models\TicketState;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        //
        $request['user_id']= auth()->user()->id;
        $inputs = $request->all();
        $ticket = Ticket::find($request->input('ticket_id'));
        Comment::create($this->file($request));
        Notification::send(User::role('Admin')->get(), new NewComment($ticket));
        if ($user = $ticket->user) {
            $user->notify(new NewComment($ticket));
        }
        return redirect()->back()->with(['messageok' => 'Registro exitoso del comentario']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
