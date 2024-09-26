@extends('layouts.admin')
@section('contenu_page')

   <div class="dashboard_content">
    <h3>Le recap de votre activite sur la plateforme</h3>
        <div class="stats">

            <div class="card">
                <span>{{count($clients)}}</span>
                <p class="nombre">Clients</p>
            </div>

            <div class="card">
                <span>{{count($admins)}}</span>
                <p class="nombre">Administrateurs</p>
            </div>

            <div class="card">
                <span>{{count($gestionnaires)}}</span>
                <p class="nombre">Gestionnaires</p>
            </div>


            <div class="card">
                <span>{{count($en_attente)}}</span>
                <p class="nombre">Demandes en attente</p>
            </div>
            <div class="card">
                <span>{{count($approuves)}}</span>
                <p class="nombre">Demandes approuvées</p>
            </div>

            <div class="card">
                <span>{{count($rejetes)}}</span>
                <p class="nombre">Demandes rejetées</p>
            </div>
            <div class="card">
                <span>{{count($messages)}}</span>
                <p class="nombre">Messages</p>
            </div>
        </div>
        @if (count($admins)  > 0 )
            <div class="tab_admins">
                <h3>Liste des administrateurs</h3>
                <table class="container">
                    <thead>
                    <tr>
                        <th><h4>Id</h4></th>
                        <th><h4>Nom</h4></th>
                        <th><h4>Email</h4></th>
                        <th><h4>telephone</h4></th>
                        <th><h4>quartier</h4></th>
                        <th><h4>Action</h4></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            @if($admin->id !== auth()->user()->id)
                                <tr>
                                    <td>{{$admin->id}}</td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->telephone}}</td>
                                    <td>{{$admin->quartier}}</td>
                                    <td>
                                        <a href="{{Route('user.delete',$admin->id)}}">Supprimer</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
        
            </div>
        @endif
        @if (count($clients)  > 0 )
            <div class="tab_clients">
                <h3>Liste des clients</h3>
                <table class="container">
                    <thead>
                        <tr>
                            <th><h4>Id</h4></th>
                            <th><h4>Nom</h4></th>
                            <th><h4>Email</h4></th>
                            <th><h4>telephone</h4></th>
                            <th><h4>quartier</h4></th>
                            <th><h4>Action</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->telephone}}</td>
                                <td>{{$client->quartier}}</td>
                                <td>
                                    <a href="{{Route('user.delete',$client->id)}}">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        
            </div>

        @endif
       @if (count($gestionnaires)  > 0 )
            <div class="tab_gestionnaires">
                <h3>Liste des gestionnaires</h3>
                <table class="container">
                    <thead>
                        <tr>
                            <th><h4>Id</h4></th>
                            <th><h4>Nom</h4></th>
                            <th><h4>Email</h4></th>
                            <th><h4>telephone</h4></th>
                            <th><h4>quartier</h4></th>
                            <th><h4>Action</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gestionnaires as $gestionnaire)
                            <tr>
                                <td>{{$gestionnaire->id}}</td>
                                <td>{{$gestionnaire->name}}</td>
                                <td>{{$gestionnaire->email}}</td>
                                <td>{{$gestionnaire->telephone}}</td>
                                <td>{{$gestionnaire->quartier}}</td>
                                <td>
                                    <a href="{{Route('user.delete',$gestionnaire->id)}}">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
       @endif
        
        
   </div>


   {{-- <style>
     .dashboard_content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 25px;
        width: 100%;
        padding: 10px;
     }
     .dashboard_content h3 {
        font-size: 27px;
        color: green;
     }
    .dashboard_content .stats {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 25px;
        width: 100%;
        padding: 10px;
        flex-wrap: wrap;
    }
    .card {
        padding: 20px;
        width: 350px;
        height: 250px;
        box-shadow: 2px 2px 4px #0000003f;
        background: white
    }
    .card:hover {
        box-shadow: 5px 5px 8px #0000003f;
        transition: .6s;
    }
    .card span {
        font-size: 55px;
        color: green;
    }

    .tab_admins,.tab_clients,.tab_gestionnaires {
        width: 100%;
        display:flex;
        flex-direction: column;
        align-items: center;

    }


    .container {
            text-align: left;
            width: 80%;
            margin: 0 auto;
            display: table;
            padding: 0 0 8em 0;
            overflow-x: scroll;
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