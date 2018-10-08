<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

class UserProfileController extends Controller
{




    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user= User::find(auth()->user()->id);
        return view('profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request)
    {
      //$user['password']);
      //dd($request);
      $user= User::find(auth()->user()->id);
      if($request['password']!=""){
        $request['password']= bcrypt($request['password']);
        //dd($user);
      }else{
          $request['password']=$user['password'];
      }
        $user->fill($request->all())->save();
        return redirect()->back()->with(['messageok' => 'Usuario "'.$user->name.'" actualizado']);

      //  return redirect()->back()->with('success', ['your message,here']);




    }

}
