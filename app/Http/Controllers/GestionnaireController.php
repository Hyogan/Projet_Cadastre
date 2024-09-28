<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class GestionnaireController extends Controller
{
    public function dashboard()
    {
        
        $en_attente = Demande::where('statut','en_attente')->get();
        $rejetes = Demande::where('statut','rejete')->get();
        $approuves = Demande::where('statut','approuve')->get();
        $clients = User::where('role','client')->get();
        $gestionnaires = User::where('role','gestionnaire')->get();
        return view("gestionnaire.home",compact(['en_attente','rejetes','approuves','clients','gestionnaires']));
    }

    public function create() {
        return view('gestionnaire.create');
    }


    public function listeDemandes() {
        $demandes = Demande::with('client')->get();

        return view('gestionnaire.liste_demandes',compact('demandes'));
    }



    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:1',
            'telephone' => 'required|min:1|max:1',
            'quartier' => 'required|min:3',
            'nationalite' => 'required|min:5', 
            'birthplace' => 'required|min:2',
            'birthdate' => 'required|date|before:' . Carbon::now()->subYears(20)->toDateString(),
        ]);

        Log::info('Creating User:', $validated);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type_personne' => "personne_physique",
            'telephone' => $validated['telephone'],
            'quartier' => $validated['quartier'],
            'nationalite' => $validated['nationalite'],
            'birthplace' => $validated['birthplace'],
            'birthdate' => $validated['birthdate'],
            'role' => 'gestionnaire'
        ]);
        $user->role = 'gestionnaire';
        $user->save();

        return redirect(Route('admin.dashboard'));
    }

}
