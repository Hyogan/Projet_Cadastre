@extends('layouts.base')
@section('contenu_head')
    <title>Détails de la demandee</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta charset="UTF-8">
@endsection

@section('contenu_body')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            font-size: 20px;
            color: #007bff;
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .details {
            padding: 10px;
            border: 1px solid #eaeaea;
            border-radius: 4px;
            background-color: #fafafa;
        }
        .details p {
            margin: 0;
            padding: 5px 0;
        }
        .details strong {
            display: inline-block;
            width: 200px;
            color: #333;
        }
        .document-photo {
            display: block;
            width: 100%;
            border-radius: 4px;
            margin-top: 10px;
        }
        .document-photo img{
            max-width: 90%;
            max-height: 90%;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
    <div class="container">
        <h1>Détails de la demande</h1>
        
        <div class="section">
            <h2>Informations sur la demandee</h2>
            <div class="details">
                <p><strong>Arrondissement:</strong> {{ $demande->arrondissement }}</p>
                <p><strong>Numéro du Titre Foncier:</strong> {{ $demande->numero_du_titre_foncier }}</p>
                <p><strong>Décret:</strong> {{ $demande->decret }}</p>
                <p><strong>Superficie:</strong> {{ $demande->superficie }} M<sup>2</sup></p>
                <p><strong>Destination:</strong> {{ $demande->destination }}</p>
                <p><strong>Statut:</strong> {{  str_replace('_',' ',$demande->statut )}}</p>
            </div>
        </div>

        <div class="section">
            <h2>Informations sur l'Utilisateur</h2>
            <div class="details">
                <p><strong>Nom:</strong> {{ $demande->client->name }}</p>
                <p><strong>Né le :</strong> {{ $demande->client->birthdate }}</p>
                <p><strong>A :</strong> {{ $demande->client->birthplace }}</p>
                <p><strong>Email:</strong> {{ $demande->client->email }}</p>
                <p><strong>Téléphone:</strong> {{ $demande->client->telephone }}</p>
                <p><strong>Quartier de residence:</strong> {{ $demande->client->quartier }}</p>
                <p><strong>Type de Personne:</strong> {{ str_replace('_',' ',$demande->client->type_personne) }}</p>
            </div>
        </div>

        <div class="documents section">
            <h2>Informations sur les documemts lié à la demande</h2>
            <div class="details">
                <div class="document-list">
                        @foreach($demande->documents as $document)
                            <strong>Libelle:</strong> {{ $document->libelle }}<br>
                            <strong>Type:</strong> {{ $document->type }}<br>
                            <strong>Description:</strong> {{ $document->description }}<br>
                            <strong>Photo:</strong> 
                            <div class="document-photo">
                                <img src="{{ Storage::url($document->photo) }}" alt="Document Photo">
                            </div>
                        @endforeach
                </div>
            </div>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} Biens fonciers Cameroun -- Domaine</p>
        </div>
    </div>
