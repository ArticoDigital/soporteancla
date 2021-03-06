<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Ticket;
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
        $request['password'] = bcrypt($request['password']);
        $request['is_send_mail'] = $request['is_send_mail'] ?? 0  ;
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
    public function edit(User $user, Request $inputs)
    {
        /*$states = TicketState::all();
        $user->load('tickets');
        return view('user', compact('user','states'));*/
        $data = $inputs->all();

        $states = TicketState::all();
        //$user->load('tickets');

        $data['statesearch'] = (empty($inputs['state'])) ?
            TicketState::where('isActive', '=', 1)->select('id')->get()->toArray() :
            [$inputs['state']];

        if (!empty($inputs['dates'])) {
            $datev = explode(" a ", $inputs['dates']);

            if (!isset($datev[1])) {
                $datev[1] = $datev[0];
            }

            $tickets = Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                ->whereIn('ticket_state_id', $data['statesearch'])
                ->where('user_id', $user->id)
                ->whereDate('created_at', '>=', $datev[0])
                ->whereDate('created_at', '<=', $datev[1])
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {

            $tickets = Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
                ->whereIn('ticket_state_id', $data['statesearch'])
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('user', compact('user', 'states', 'tickets', 'data'));
    }

    public function editfiltrado(Request $inputs, $id)
    {
        //dd($id);

        //$user=User::find($id)->tickets;
        //dd($inputs);
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
            $user = User::find($id)->wherehas('tickets', function ($q) use ($inputs, $datev) {
                $q->whereIn('ticket_state_id', $inputs['state'])
                    ->whereDate('created_at', '>=', $datev[0])
                    ->whereDate('created_at', '<=', $datev[1]);
            })->with(['tickets' => function ($q) use ($inputs, $datev) {
                $q->whereIn('ticket_state_id', $inputs['state'])
                    ->whereDate('created_at', '>=', $datev[0])
                    ->whereDate('created_at', '<=', $datev[1]);
            }])->first();
        } else {
            //$user = User::find($id);
            //dd($user);
            $user = User::find($id)->wherehas('tickets', function ($q) use ($inputs) {
                $q->whereIn('ticket_state_id', $inputs['state']);
            })->with(['tickets' => function ($q) use ($inputs) {
                $q->whereIn('ticket_state_id', $inputs['state']);
            }])->first();


            //$user->tickets()->whereIn('ticket_state_id',  $inputs['state'])->get();
            //dd($user);
            /*
              $user = User::find($id)->with('tickets',function($q) use ($inputs) {
                dd($q);
              $q->whereIn('ticket_state_id', $inputs['state']);
            });*/
        }
        //dd($user);
        if (empty($user)) {
            //dd("vaco");
            $data['notickets'] = true;
            $user = User::find($id);

        }
        //$user->load('ticketsfiltro',$inputs);
        return view('user', compact('user', 'states', 'data'));
    }

    public function editfiltradoget(Request $inputs, $id)
    {
        //dd($id);

        //$user=User::find($id)->tickets;
        //dd($inputs);
        $states = TicketState::all();
        $data = $inputs->all();

        $data['statesearch'] = (empty($inputs['state'])) ?
            TicketState::where('isActive', '=', 1)->select('id')->get()->toArray() :
            [$inputs['state']];

        if (!empty($inputs['dates'])) {

            $datev = explode(" a ", $inputs['dates']);

            if (!isset($datev[1])) {
                $datev[1] = $datev[0];
            }
            $user = User::find($id)->wherehas('tickets', function ($q) use ($data, $datev) {
                $q->whereIn('ticket_state_id', $data['statesearch'])
                    ->whereDate('created_at', '>=', $datev[0])
                    ->whereDate('created_at', '<=', $datev[1]);
            })->with(['tickets' => function ($q) use ($data, $datev) {
                $q->whereIn('ticket_state_id', $data['statesearch'])
                    ->whereDate('created_at', '>=', $datev[0])
                    ->whereDate('created_at', '<=', $datev[1])//->paginate(1)
                ;
            }])->first();
        } else {
            //$user = User::find($id);
            //dd($user);
            $user = User::find($id)->wherehas('tickets', function ($q) use ($data) {
                $q->whereIn('ticket_state_id', $data['statesearch']);
            })->with(['tickets' => function ($q) use ($data) {
                $q->whereIn('ticket_state_id', $data['statesearch'])//->paginate(1)
                ;
            }])->first();

            //$user->tickets;
            //dd($user->tickets);

            //$user->tickets()->whereIn('ticket_state_id',  $inputs['state'])->get();
            //dd($user);
            /*
              $user = User::find($id)->with('tickets',function($q) use ($inputs) {
                dd($q);
              $q->whereIn('ticket_state_id', $inputs['state']);
            });*/
        }
        //dd($user);
        if (empty($user)) {
            //dd("vaco");
            $data['notickets'] = true;
            $user = User::find($id);

        }
        //$user->load('ticketsfiltro',$inputs);
        return view('user', compact('user', 'states', 'data'));
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

        if ($request['password'] != "") {
            $request['password'] = bcrypt($request['password']);
            //dd($user);
        } else {
            $request['password'] = $user['password'];
        }
        $request['is_send_mail'] = $request['is_send_mail'] ?? 0  ;
        $user->syncRoles([$request->input('role')]);
        $user->fill($request->all())->save();
        return redirect()->back()->with(['messageok' => 'Usuario "' . $user->name . '" actualizado']);

        //  return redirect()->back()->with('success', ['your message,here']);


    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if ($user->tickets()->count()) {
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
