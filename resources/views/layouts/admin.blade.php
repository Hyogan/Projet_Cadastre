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
                    <a href="{{Route('admin.dashboard')}}" class="text-slate-600 hover:rounded-lg w-full py-4 px-4 cursor-pointer flex justify-start items-center space-x-2 transition hover:text-white hover:bg-blue-500 dark:text-white" title="dashboard">
                        <i class="text-center fa-solid fa-grip"></i>
                        <span class="menu-item">dashboard</span>
                       
                    </a>
                    
                    <a href="{{Route('demandes.index')}}" id="drivers" class="hover:shadow-xl shadow-gray-400 text-slate-600 hover:rounded-lg w-full py-4 px-4 cursor-pointer flex justify-start items-center space-x-2 transition hover:text-white hover:bg-blue-500 dark:text-white" title="message">
                        <i class="text-center fa-regular fa-id-card"></i>
                        <span class="menu-item">Liste des demandes</span>
                    </a>
                    <a href="{{Route('message.index')}}" id="drivers" class="hover:shadow-xl shadow-gray-400 text-slate-600 hover:rounded-lg w-full py-4 px-4 cursor-pointer flex justify-start items-center space-x-2 transition hover:text-white hover:bg-blue-500 dark:text-white" title="message">
                        <i class="text-center fa-regular fa-id-card"></i>
                        <span class="menu-item">Messages</span>
                    </a>
                   
                    <a href="{{Route('user.logout')}}" id="deconnecter" class="text-slate-600 hover:rounded-lg w-full py-4 px-4 cursor-pointer flex justify-start items-center space-x-2 transition hover:text-white hover:bg-blue-500 dark:text-white" title="deconnexion">
                       
                        <i class="text-center fa-solid fa-arrow-right-from-bracket"></i>
                        <span class="menu-item">Deconnexion</span>

                    </a>
                </div>
            </sidebar>
            <div class="w-full h-full bg-black z-30 absolute top-0 left-0 bg-opacity-70 hidden" id="dark_overlay"></div>

            <section class="dashboard_content" id="dashboard_content">
                
                <div class='dashboard_intro'>
                    <p>Domaines privés de l'Etat</p>
                    <button><a href="{{Route('user.logout')}}">Deconnexion</a></button>
                </div>
                
                @yield('contenu_page')
            </section>

        </main>
@endsection
