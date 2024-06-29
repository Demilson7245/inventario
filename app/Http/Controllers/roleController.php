<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function principal()
    {
        $roles = Role::withTrashed()->paginate(5);
        return view('roles.principal', ['rol' => $roles]);
    }

    public function crear()
    {
        return view('roles.crear');
    }

    public function mostrar($variable)
    {
        $role = Role::withTrashed()->findOrFail($variable);
        return view("roles.mostrar", compact('role'));
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->nombre = $request->nombre;
        $role->save();

        return redirect()->route('role.mostrar', $role->id);
    }

    public function borrar($id){
        $role=Role::withTrashed()->find($id);
        $role->forceDelete();
        return redirect()->route('role.principal');
     }

    public function desactivarole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('role.principal');
    }

    public function activarole($id)
    {
        $role = Role::withTrashed()->findOrFail($id);
        $role->restore();

        return redirect()->route('role.principal');
    }

    public function editar($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.editar', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->nombre = $request->nombre;
        $role->save();

        return redirect()->route('role.mostrar', $role->id);
    }
}
