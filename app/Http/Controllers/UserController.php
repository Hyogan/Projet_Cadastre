<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function signup()
    {
        return view("auth.inscription");
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Auth::attempt($credentials) ;

        if ($user) {
            if(auth()->user()->role == 'gestionnaire')
                return redirect(Route('gestionnaire.dashboard'));
            else if(auth()->user()->role == 'admin')
                return redirect(Route('admin.dashboard'));
            else
                return redirect(Route('client.acceuil'));
        }

        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:1',
            'type_personne' => 'required',
            'telephone' => 'required|min:1|max:1',
            'quartier' => 'required|min:3',
            'nationalite' => 'required|min:5',
            'birthplace' => 'required|min:2',
            'birthdate' => 'required|date|before:' . Carbon::now()->subYears(20)->toDateString(),
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type_personne' => $validated['type_personne'],
            'telephone' => $validated['telephone'],
            'quartier' => $validated['quartier'],
            'nationalite' => $validated['nationalite'],
            'birthplace' => $validated['birthplace'],
            'birthdate' => $validated['birthdate']
        ]);

        Auth::login($user);

        if(auth()->user()->role == 'gestionnaire.dashboard')
            return redirect(Route('client.acceuil'));
        else if(auth()->user()->role == 'admin')
            return redirect(Route('admin.dashboard'));
        else
            return redirect(Route('client.acceuil'));
    }

    public function delete(User $user) 
    {
        if($user && $user->id !== auth()->user()->id) {
            $user->delete();
        }
        else{
            dd($user);
        }
        return redirect(Route('admin.dashboard'));
        
    }

}
