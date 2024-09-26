@extends('layouts.admin')
@section('contenu_page')  
    <div class="page_demande">
        <h2>Consultez la liste des messages envoyés par les utilisateurs du système</h2>
        <div class="page_container">
                <table class="container">
                <thead>
                    <tr>
                    <th><h4>Nom</h4></th>
                    <th><h4>Email</h4></th>
                    <th><h4>Message</h4></th>
                    <th><h4>Envoyé le</h4></th>
                    <th><h4>Action</h4></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->contenu }}</td>
                        <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                        <td> <a href="{{Route('messsage.delete',$message->id)}}">Supprimer</a></td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
  
        </div>
    </div>
@endsection