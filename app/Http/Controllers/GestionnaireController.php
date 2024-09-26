<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\User;
use Illuminate\Http\Request;

class GestionnaireController extends Controller
{
    public function dashboard()
    {
        $en_attente = Demande::where('statut','en_attente')->get();
        $rejetes = Demande::where('statut','rejete')->get();
        $approuves = Demande::where('statut','approuve')->get();
        $clients = User::where('role','client')->get();
        return view("client.home",compact(['en_attente','rejetes','approuves','clients']));
    }
}
