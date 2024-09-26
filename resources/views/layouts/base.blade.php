<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
       
        <link rel="stylesheet" href="{{ asset('css/base.css') }}">
        <script src="{{ asset('js/script.js') }}"></script>
        @yield('contenu_head')
        <!-- Styles -->
    </head>
    <body>
        @yield('contenu_body')
   </body>
</html>
