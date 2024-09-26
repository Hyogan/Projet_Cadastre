
@extends('layouts.base')
@section('contenu_head')
    <title>Home</title>   
@endsection

@section('contenu_body')
    <header>
        <nav>
            <div class="logo"><img src="{{asset('images/armoiries_cameroun.png')}}" alt="logo" /></div>
            <ul>
                <li><a href="#">Home</a></li>
               @auth
                    <li><a href="{{Route('user.logout')}}">Deconnexion</a></li>    
               @endauth
               @if(!auth()->user())
                <li><a href="{{Route('user.signup')}}">Inscription</a></li>
                <li><a href="{{Route('user.login')}}">Connexion</a</li>
                  
               @endif    
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="hamburger">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
            </div>
        </nav>
        <div class="menubar">
            <ul>
                <li><a href="">Home</a</li>
                <li><a href="{{Route('user.signup')}}">Inscription</a</li>
                <li><a href="{{Route('user.login')}}">Connexion</a</li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </header>
    <main>
        <section class="hero_section">
            <h1>Registres des domaines</h1>
            <p>Inscrivez vous et faites votre de demande de tittre foncier aisément</p>
            <div class="hero_links">
                <a href="{{Route('user.login')}}">Me connecter</a>
                <a href="{{Route('user.signup')}}">M'inscrire</a>
            </div>
        </section>
        <section class="contact_us">
            <h2>Contact</h2>
            <p>Un soucis, une incomprehension ? Envoyez nous un message</p>
           <form action="{{ Route('message.store') }}" method="POST">      
                @csrf
                <input name="name" type="text" class="feedback-input" placeholder="Nom prenom" />   
                @error("name")
                    <p class="text-error">{{$message}}</p>
                @enderror  
                <input name="email" type="text" class="feedback-input" placeholder="Email" />
                @error("email")
                    <p class="text-error">{{$message}}</p>
                @enderror  
                <textarea name="contenu" class="feedback-input" placeholder="Message"></textarea>
                @error("contenu")
                    <p class="text-error">{{$message}}</p>
                @enderror  
                <button type="submit" >Envoyer</button>
            </form>


        </section>
    </main>

    <footer>
    <section class="footer_content">
        <div class="footer_block">
            <h4>Contact</h4>
            Ministère des Domaines, du Cadastre et des Affaires Foncières Tel: (+237) 22 22 22 26 Fax: (+237) 222 22 22 22 E-mail: contact@example.cm 
        </div>
        <div class="footer_block">
            <h4>a propos</h4>
            <ul>
                <li>A propos</li>
                <li>Nous contacter</li>
                <li>Termes de services</li>
            </ul>
        </div>
    </section>
    <div class="copyright">
        Copyright © 2022 - Service Departemental des Domaines - Tous droits réservés ® .H - Setup
    </div>
    </footer>

    <script src="script.js"></script>
@endsection