<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $users = User::paginate(20);

         return view('users.index', compact('users'));
     }
     /**
      * Display the specified resource.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function show(user $user)
     {
         return view('users.show', compact('user'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\user  $user
      * @return \Illuminate\Http\Response
      */
     public function edit(User $user)
     {
         //return $user;
         $roles = Role::get();
         //return $roles;
         return view('users.edit', compact('user','roles'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\user  $user
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, User $user)
     {
         /*$user = User::find($id);
         $user->name = $request->name;
         $user->save();*/
         $user->update($request->all());

         //actualizacion de Roles
         $user->roles()->sync($request->get('roles'));
         return redirect()->route('users.edit', $user->id)
             ->with('info', 'Usuario actualizado con éxito');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\user  $user
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $users = user::find($id);
         //return $users;
         $user = user::find($id)->delete();
         return back()->with('info', $users->name.' Eliminado correctamente');
     }
}
