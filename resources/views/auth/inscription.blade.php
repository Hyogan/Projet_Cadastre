
@extends('layouts.base')
@section('contenu_head')
    <title>Inscription</title>   

@endsection

@section('contenu_body')
    <div class="login-page">
        <h3>Creer un compte  !</h3>
        <div class="form">
        <form class="register-form" method="POST" action="{{Route('user.store')}}">
            @csrf
            <input type="text" name="name" placeholder="Nom prenom"/>
            @error("name")
                <p class="text-error">{{$message}}</p>
            @enderror  
            <input type="password" name="password" placeholder="mot de passe"/>
            @error("password")
                <p class="text-error">{{$message}}</p>
            @enderror  
            <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe"/>
            <input type="text" name="email" placeholder="Adresse email"/>
            @error("email")
                <p class="text-error">{{$message}}</p>
            @enderror 
            <select name="type_personne">
                <option value="personne_morale">Personne morale</option>
                <option value="personne_physique">Personne physique</option>
            </select>
            @error("type_personne")
                <p class="text-error">{{$message}}</p>
            @enderror  

            {{-- Date de naissance --}}
            <input type="date" name="birthdate" placeholder="Date de naissance"/>
            @error("birthdate")
                <p class="text-error">{{$message}}</p>
            @enderror 
                    {{-- Lieu de naissance --}}
            <input type="text" name="birthplace" placeholder="Lieu de naissance"/>
            @error("birthplace")
                <p class="text-error">{{$message}}</p>
            @enderror 

            {{-- Nationnalite --}}
            <input type="text" name="nationalite" placeholder="nationalite"/>
            @error("nationalite")
                <p class="text-error">{{$message}}</p>
            @enderror 

            <input type="text" name="telephone" inputmode="numeric" pattern="[0-9]+" placeholder="Numero de telephone">
            @error("telephone")
                <p class="text-error">{{$message}}</p>
            @enderror  
            <input type="text" name="quartier" placeholder="Votre quartier">
            @error("quartier")
                <p class="text-error">{{$message}}</p>
            @enderror  
            <button>creer un compte</button>
            <p class="message">Vous avez deja un compte ?<a href="{{Route('login')}}">Connectez vous</a></p>
        </form>
        </div>
    </div>

@endsection