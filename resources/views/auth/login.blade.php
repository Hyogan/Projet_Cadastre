
@extends('layouts.base')
@section('contenu_head')
    <title>Connexion</title>   
@endsection

@section('contenu_body')
<div class="login-page">
    <h2>Me connecter a mon compte  !</h2>
    <div class="form">
      <form class="login-form" action="{{Route('user.authenticate')}}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Adresse email"/>
        @error("email")
            <p class="text-error">{{$message}}</p>
        @enderror  
        <input type="password" name="password" placeholder="Mot de passe"/>
        <button>login</button>
        <p class="message">Vous n'avez pas encore de compte ? <a href="{{Route('user.signup')}}">Creer un compte </a></p>
      </form>
    </div>
  </div>

@endsection