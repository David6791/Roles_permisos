<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $roles = Role::paginate(20);

         return view('roles.index', compact('roles'));
     }
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $permissions = Permission::orderBy('id')->get();
         return view('roles.create',compact('permissions'));
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $role = Role::create($request->all());
         //actualizacion de Roles
         $role->permissions()->sync($request->get('permissions'));
         //return $role->id;
         return redirect()->route('roles.edit', $role->id)
             ->with('info', 'Rol registrado con  éxito');
     }
     /**
      * Display the specified resource.
      *
      * @param  \App\Role $user
      * @return \Illuminate\Http\Response
      */
     public function show(Role $role)
     {
         return view('roles.show', compact('role'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Role $user
      * @return \Illuminate\Http\Response
      */
     public function edit(Role $role)
     {
         //return $user;
         $permissions = Permission::orderBy('id')->get();
         //return $roles;
         return view('roles.edit', compact('role','permissions'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Role $user
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Role $role)
     {
         /*$Role= User::find($id);
         $user->name = $request->name;
         $user->save();*/
         $role->update($request->all());

         //actualizacion de Roles
         $role->permissions()->sync($request->get('permissions'));

         return redirect()->route('roles.edit', $role->id)
             ->with('info', 'Rol Actualizado con exito actualizado con éxito');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Role $user
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $roles = Role::find($id);
         //return $users;
         $role= Role::find($id)->delete();
         return back()->with('info', $roles->name.' Eliminado correctamente');
     }
}
