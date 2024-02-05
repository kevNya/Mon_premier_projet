{{--<ul>
    <li><a href="{{route('page_accueil')}}"> Accueil </a></li> {{--SYNTAXE POUR METTRE UNE ROUTE DANS UN HREF--}
    <li><a href="{{route('page_about')}}"> about </a></li>

</ul>--}}
<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id= "navbarSupportedContent">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link @if (Request::route()->getName() == 'page_ac') active @endif " href="{{route('page_ac')}}">Home <i class="fas fa-home fa-1x"></i></a>

        {{--si nous sommes dans le repertoire home alors active la page --}}
        </li>
          @guest
            <li class="nav-item">
            <a class="nav-link  @if (Request::route()->getName() == 'page_about') active @endif " href="{{route('page_about')}}">About </a>
            </li>
            @endguest
            <li class="nav-item">

            <a class="nav-link  @if (Request::route()->getName() == 'rendezvous.create') active @endif " href="{{route('rendezvous.create')}}">Appointment <i class="fas fa-calendar fa-1x"></i></a>
          </li>
          @auth
            @if(auth()->user()->membre == 1){{--IL APPARAIT SI ET SEULEMENT L'UTILISATEUR A la valeur 1 dans la table membre--}}
                <li class="nav-item ">
                <a class="nav-link  @if (Request::route()->getName() == 'page_dashboard') active @endif " href="{{route('page_dashboard')}}">Dashboard <i class="fas fa-list fa-1x"></i></a>
                </li>
            @endif
          @endauth


      </ul>

    </div>
        <!-- Example single danger button -->


    <div class="btn-group">
        @guest <!--si on est encore en mode invité on peut voir ceci mais une fois qu'on est connecté ça disparait-->
           <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Connexion <i class="fas fa-user fa-1x "></i></button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" type="button" href="{{route('login')}}">Account</a></li>
                <li><a class="dropdown-item" type="button" href="{{route('register')}}">New Account</a></li>

            </ul>
        @endguest
        @auth<!--Syntaxe qui concerne l'utilisateur connecté tout cela est gérer par fortify-->
            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::user()->name}}{{--syntaxe pour récupérer le nom de l'utilisateur--}} <span class="fas fa-user fa-1x "></span></button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" type="button" href="{{route('page_logout')}}">Logout</a></li>

            </ul>
        @endauth
        @guest
            <br>
            <nav class="navbar fixed-bottom navbar-light bg-secondary">
            <span class="navbar-text">
              Contactez-nous | Suivez-nous sur :
              <!-- Ajoutez ici vos icônes de réseaux sociaux-->

              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-snapchat"></i></a>
              <a href="#"><i class="fab fa-whatsapp"></i></a>
            </span>


          </nav>
        @endguest

    </div>
  </nav>
