@extends('layouts.admin')
@section('contenu_page')  
    <div class="page_demande">
        <h2>Consultez la liste des demandes de titres et l'evolution de leur statut !</h2>
        <div class="page_container">
          <table class="container">
              <thead>
                <tr>
                  <th><h4>Id</h4></th>
                  <th><h4>Id client</h4></th>
                  <th><h4>Nom client</h4></th>
                  <th><h4>Arrondissement</h4></th>
                  <th><h4>Numero titre foncier</h4></th>
                  <th><h4>Superficie</h4></th>
                  <th><h4>Destination</h4></th>
                  <th><h4>budget</h4></th>
                  <th><h4>Statut</h4></th>
                  <th><h4>Date de creation</h4></th>
                  <th><h4>Action</h4></th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($demandes as $demande)
                      <tr>
                        <td>{{$demande->id}}</td>
                        <td>{{$demande->client_id}}</td>
                        <td>{{$demande->client->name}}</td>
                        <td>{{$demande->arrondissement}}</td>
                        <td>{{$demande->numero_du_titre_foncier}}</td>
                        <td>{{$demande->superficie}}</td>
                        <td>{{str_replace('_', ' ', $demande->destination)}}</td>
                        <td>{{$demande->budget}}</td>
                        <td>{{str_replace('_', ' ', $demande->statut)}}</td>
                        <td>{{$demande->created_at->format('j F, Y')}}</td>
                        <td>
                           <a href="{{Route('demandes.pdf',$demande->id)}}">Imprimer</a>
                           <a href="{{Route('demandes.consulter',$demande->id)}}">Consulter</a>
                          </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
  
        </div>
    </div>
@endsection