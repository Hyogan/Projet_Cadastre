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
    }
    .card {
        padding: 20px;
        width: 300px;
        height: 200px;
        box-shadow: 2px 2px 4px #0000003f;
        color: blue;
        background: white;
    }
    .card:hover {
        box-shadow: 5px 5px 8px #0000003f;
        transition: .6s;
    }
    .card span {
        font-size: 55px;
        color: green;
    }
   </style> --}}
@endsection