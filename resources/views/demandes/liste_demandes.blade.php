@extends('layouts.client')
@section('contenu_page')  
    <div class="page_demande">
        <h2>Consultez la liste de vos demandes de titres et l'evolution de leur statut !</h2>
        <table class="container">
            <thead>
              <tr>
                <th><h4>Id</h4></th>
                <th><h4>Arrondissement</h4></th>
                <th><h4>Numero titre foncier</h4></th>
                <th><h4>Superficie</h4></th>
                <th><h4>Destination</h4></th>
                <th><h4>budget</h4></th>
                <th><h4>Date de creation</h4></th>
                <th><h4>Statut</h4></th>
                <th><h4>Action</h4></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($demandes as $demande)
                    <tr>
                    <td>{{$demande->id}}</td>
                    <td>{{$demande->arrondissement}}</td>
                    <td>{{$demande->numero_du_titre_foncier}}</td>
                    <td>{{$demande->superficie}}</td>
                    <td>{{str_replace('_', ' ', $demande->destination)}}</td>
                    <td>{{str_replace('_', ' ', $demande->budget)}}</td>
                    <td>{{str_replace('_', ' ', $demande->statut)}}</td>
                    <td>{{str_replace('_', ' ', $demande->created_at)}}</td>
                    <td>
                        <a href="{{Route('client.demandes.supprimer',$demande->id)}}">Annuler</a>
                        <a href="{{Route('client.demandes.modifier',$demande->id)}}">Modifier</a>
                        <a href="{{Route('demandes.pdf',$demande->id)}}">Imprimer</a>
                        <a href="{{Route('demandes.consulter',$demande->id)}}">Consulter</a>
                    </td>
                  </tr>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    {{-- <style>

        
        .page_demande {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 8% 0 0;
            margin: auto;
            gap: 10px;
        }


        
        .container th h4 {
            font-weight: bold;
            font-size: 1em;
            text-align: left;
            color: white;
        }

        .container td {
            font-weight: normal;
            font-size: 1em;
            -webkit-box-shadow: 0 2px 2px -2px #0E1119;
            -moz-box-shadow: 0 2px 2px -2px #0E1119;
                box-shadow: 0 2px 2px -2px #0E1119;
        }
        .container td a {
            border-right: 2px solid white;
            padding-inline: 1px;
            color: white;
        }
        .container td a:hover {
            color: green;
        }

        .container {
            text-align: left;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            display: table;
            padding: 0 0 8em 0;
        }

        .container td, .container th {
            padding-bottom: 2%;
            padding-top: 2%;
            padding-left:2%;  
        }

        /* Background-color of the odd rows */
        .container tr:nth-child(odd) {
            background-color: #323C50;
        }

        /* Background-color of the even rows */
        .container tr:nth-child(even) {
            background-color: #2C3446;
        }

        .container th {
            background-color: #1F2739;
        }

        .container td:first-child { color: white; }

        .container tr:hover {
            background-color: #464A52;
            -webkit-box-shadow: 0 6px 6px -6px #0E1119;
            -moz-box-shadow: 0 6px 6px -6px #0E1119;
            box-shadow: 0 6px 6px -6px #0E1119;
        }

        @media (max-width: 800px) {
        .container td:nth-child(4),
        .container th:nth-child(4) { display: none; }
        }

    </style> --}}
@endsection