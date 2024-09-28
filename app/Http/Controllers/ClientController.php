<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home() {

        $en_attente = Demande::where('statut','en_attente')->where('client_id',auth()->user()->id)->get();
        $rejetes = Demande::where('statut','rejete')->where('client_id',auth()->user()->id)->get();
        $approuves = Demande::where('statut','approuve')->where('client_id',auth()->user()->id)->get();
        return view("client.home",compact(['en_attente','rejetes','approuves']));
    }
}
