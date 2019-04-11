<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     
   

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="TeleFriend Social WebSie for Final Year Project" />
        <meta name="keywords" content="TeleFriend, Social Media," />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : '' }}">
        <title>TeleFriend | A Complete Social Network Website</title>

    <!-- Stylesheets
    ================================================= --> 
    <script src="{{ asset('assets/js/scroll.js') }}" ></script>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />   
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />

    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
 
    <!-- Styles -->
    <!-- <link href="{ { asset('css/app.css') }}" rel="stylesheet"> -->


</head>
<body>
    

 

    <div id="app"> 

   @if (!is_null(auth()->user()))
            <asdsadasdas></asdsadasdas>
            <br>
  @endif




          <main class="py-4">
            @yield('content')
        </main>

 
    </div>

        <script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> 
        <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.incremental-counter.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        
         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
