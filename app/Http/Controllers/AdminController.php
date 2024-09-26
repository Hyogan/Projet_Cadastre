<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $en_attente = Demande::where('statut','en_attente')->get();
        $rejetes = Demande::where('statut','rejete')->get();
        $approuves = Demande::where('statut','approuve')->get();
        $clients = User::where('role','client')->get();
        $admins = User::where('role','admin')->get();
        $gestionnaires = User::where('role','gestionnaire')->get();
        $messages = Message::all();
        return view("admin.home",compact(['en_attente','rejetes','approuves','clients','admins','gestionnaires','messages']));
    }

    public function listeDemandes() {
        $demandes = Demande::with('client')->get();

        return view('admin.liste_demandes',compact('demandes'));
    }
}
