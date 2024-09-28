@extends('layouts.gestionnaire')
@section('contenu_page')

<div class="dashboard_content">
    <h3>Le recap de votre activite sur la plateforme</h3>
        <div class="stats">

            <div class="card">
                <span>{{count($clients)}}</span>
                <p class="nombre">Clients</p>
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
           
        </div>
       
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
           
        
        
   </div>


   <style>
   
   </style>
@endsection