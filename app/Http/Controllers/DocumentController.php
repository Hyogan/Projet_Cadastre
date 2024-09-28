<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function create(Demande $demande)
    {
        return view('documents.create', compact('demande'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'demande_id' => 'required|exists:demandes,id',
            'libelle' => 'required|string|max:255',
            'type' => 'required|in:arrete,decision,message_porte',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048', 
        ]);

        // Store the uploaded file
        //$path = $request->file('photo')->store('documents'); // Store in 'storage/app/documents'

        if($request->hasFile('photo')) 
        {
            $validated['photo'] = $request->file('photo')->store('documents','public');
        }

        // Create the document record
        Document::create([
            'demande_id' => $validated['demande_id'],
            'libelle' => $validated['libelle'],
            'type' => $validated['type'],
            'description' => $validated['description'],
            'photo' => $validated['photo'], 
        ]);

        return redirect()->route('gestionnaire.dashboard')->with('success', 'Document uploaded successfully.');
    }
}
