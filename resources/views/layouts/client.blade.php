@extends('layouts.base')
@section('contenu_head')
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('contenu_body')
        @php
            $user = auth()->user();
       @endphp
        <main class="w-full">
            <sidebar class="sidebar1 z-50 w-64 h-screen transition-transform -translate-x-full md:translate-x-0 dark:bg-[#222338] dark:shadow-none dark:border-r-4 border-slate-900">
                <section class="user-infos">
                    <p class="user_image"></p>
                    <h4 class="user_nom">{{auth()->user()->name}}</h4>
                    <p>{{str_replace('_', ' ', auth()->user()->type_personne)}}</p>
                </section>
                <div class="menu-items flex flex-col justify-start items-center mt-7 w-full px-2">
                    <a href="{{Route('client.acceuil')}}" class="" title="dashboard">
                        <i class="text-center fa-solid fa-grip"></i>
                        <span class="menu-item">dashboard</span>
                       
                    </a>
                    
                    <a href="{{Route('client.demandes.listes')}}" id="drivers" class="" title="message">
                        <i class="text-center fa-regular fa-id-card"></i>
                        <span class="menu-item">Liste des demandes</span>
                    </a>
                   
                    <a href="{{Route('client.demandes.create')}}" class="" title="message">
                        <i class="text-center fa-solid fa-person-running"></i>
                        <span class="menu-item">Faire une demande</span>
                    </a>
                    <a href="{{Route('user.logout')}}" id="deconnecter" class="" title="deconnexion">
                       
                        <i class="text-center fa-solid fa-arrow-right-from-bracket"></i>
                        <span class="menu-item">Deconnexion</span>

                    </a>
                </div>
            </sidebar>
            {{-- mb-8 flex flex-col items-center section-content bg-simpleBlue absolute left-0 --}}
            <section class="dashboard_content" id="dashboard_content">
                

                <div class='dashboard_intro'>
                    <p>Domaines privés de l'Etat</p>
                    <button><a href="{{Route('user.logout')}}">Deconnexion</a></button>
                </div>
                
                @yield('contenu_page')
            </section>

        </main>
@endsection
