<?php

namespace App\Http\Controllers;
use App\Models\Profile;

use Illuminate\Http\Request;
use App\Models\User;

class profileController extends Controller
{
    public function principal()
    {
        $profiles = Profile::withTrashed()->paginate(5);
        return view('profiles.principal', ['profiles' => $profiles]);
    }

    public function crear()
    {
        $users = User::all(); 
        return view('profiles.crear', compact('users'));

    }

    public function mostrar($id)
    {
        $profile = Profile::find($id);
        return view("profiles.mostrar", compact('profile'));
    }

    public function store(Request $request)
    {
        $profile = new Profile();
        $profile->cargo = $request->cargo;
        $profile->biografia = $request->biografia;
        $profile->user_id = $request->user_id;  // Asegúrate de que el formulario de creación tenga un campo para user_id

        $profile->save();
        return redirect()->route('profile.mostrar', $profile->id);
    }

    public function editar(Profile $profile)
    {
        $users = User::all(); 
        return view('profiles.editar', compact('profile', 'users'));
    }

    public function update(Request $request, Profile $profile)
    {
        $profile->cargo = $request->cargo;
        $profile->biografia = $request->biografia;
        $profile->save();
        return redirect()->route('profile.mostrar', $profile->id);
    }

    public function destroy($id)
    {
        $profile = Profile::withTrashed()->find($id);
        $profile->forceDelete();
        return redirect()->route('profile.principal');
    }

    public function desactivar($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return redirect()->route('profile.principal');
    }

    public function activar($id)
    {
        $profile = Profile::withTrashed()->find($id);
        $profile->restore();
        return redirect()->route('profile.principal');
    }
}
