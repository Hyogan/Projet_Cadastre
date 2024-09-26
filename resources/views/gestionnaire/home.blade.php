@extends('layouts.client')
@section('contenu_page')

   <div class="dashboard_content">
    <h3>Le recap de votre activite sur la plateforme</h3>
        <div class="stats">
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
        
   </div>


   <style>
   
   </style>
@endsection