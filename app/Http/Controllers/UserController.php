<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\TicketState;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request['password']= bcrypt($request['password']);
        $user = User::create($request->all());
        $user->assignRole($request->input('role'));
        return redirect()->route('user', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $states = TicketState::all();
        $user->load('tickets');
        return view('user', compact('user','states'));
    }

    public function editfiltrado(Request $inputs, $id)
    {
        $user = User::find($id)->with('tickets',function($q) use ($inputs) {
          $q->where()
        });

        $states = TicketState::all();
        //$user->load('ticketsfiltro',$inputs);
        return view('user', compact('user','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
      //$user['password']);
      //dd($request);
      if($request['password']!=""){
        $request['password']= bcrypt($request['password']);
        //dd($user);
      }else{
          $request['password']=$user['password'];
      }
        $user->syncRoles([$request->input('role')]);
        $user->fill($request->all())->save();
        return redirect()->back()->with(['messageok' => 'Usuario "'.$user->name.'" actualizado']);

      //  return redirect()->back()->with('success', ['your message,here']);




    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if ($user->tickets()->count()){
            return redirect()->back()->with(['message' =>
                ['message' => 'El usuario no puede ser elimando, tiene tickets asignados ', 'type' => 'alert-warning']
            ]);
        }
        $user->delete();
        return redirect()->back()->with(['message' =>
            ['message' => 'Usuario eliminado', 'type' => 'alert-success']
        ]);

    }
}
