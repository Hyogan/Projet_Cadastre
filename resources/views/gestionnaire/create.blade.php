@extends('layouts.admin')
@section('contenu_page')

   <div class="dashboard_content">
    <h3>Ajoutez un nouveau gestionnaire </h3>
    <div class="login-page">
        <div class="form"> 
        <form class="register-form" method="POST" action="{{Route('gestionnaire.store')}}">
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

            <input type="email" name="email" placeholder="Adresse email"/>
            @error("email")
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
                    {{-- nationalite --}}
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
        </form>
        </div>
    </div>
        
@endsection