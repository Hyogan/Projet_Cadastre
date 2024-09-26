<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class DemandeController extends Controller
{
    public function create()
    {
        return view('demandes.create');
    }

    public function store(Request $request)
    { 
        $validated = $request->validate([
            'arrondissement' => 'required|string|max:255',
            'numero_du_titre_foncier' => 'required|string|max:255',
            'superficie' => 'required|numeric',
            'destination' => 'required|in:logement,infrastructures_publiques,lotissement',
        ]);

        Demande::create([
            'client_id' => auth()->user()->id,
            'arrondissement' => $validated['arrondissement'],
            'numero_du_titre_foncier' => $validated['numero_du_titre_foncier'],
            'superficie' => $validated['superficie'],
            'destination' => $validated['destination'],
            'statut' => 'en_attente'
        ]);

        return redirect()->route('client.acceuil')->with('success', 'Demande soumise avec succès.');
    }

    public function getDemandesUtilisateur(Request $request) {
        $demandes = Demande::where('client_id',auth()->user()->id)->get();
        return view('demandes.liste_demandes', compact('demandes'));

    }
    public function index()
    {
        $demandes = Demande::all();
        return view('client.demandes.listes', compact('demandes'));
    }

    public function show(Demande $demande)
    {
        return view('demandes.show', compact('demande'));
    }


    public function modifier(Demande $demande)
    {
        return view('demandes.modifier', compact('demande'));
    }
    public function update(Request $request,Demande $demande)
    {

        $validated = $request->validate([
            'arrondissement' => 'required|string|max:255',
            'numero_du_titre_foncier' => 'required|string|max:255',
            'decret' => 'required|string|max:255',
            'superficie' => 'required|numeric',
            'destination' => 'required|in:logement,infrastructures_publiques,lotissement',
        ]);
        if ($demande) {
            $demande->update($validated);
        }
        return redirect()->route('client.acceuil')->with('success', 'Demande soumise avec succès.');
        
    }
    

    public function supprimer(Demande $demande)
    {
        $demande->delete();
        $demandes = Demande::where('client_id',auth()->user()->id)->get();
        return redirect(Route('client.demandes.listes'));
    }


    public function generatePdf(Demande $demande)
    {
        // $demands = Demande::with('user')->get();
        // $data = YourModel::all(); // Obtenez vos données depuis la base
        
        $demande = Demande::with('client')->findOrFail($demande->id);

        $pdf = PDF::loadView('demandes.imprimer', compact('demande'))->setOptions(['defaultFont' => 'Arial']);;
        return $pdf->download('demande_' . $demande->id . '.pdf');
      
        // return view('demandes.imprimer',compact('demande'));
    }
}
