@extends('welcome')

@section('title', 'Login')
@section('content')
<h2 style="margin-left: 1%"; class="text-muted">  Please Sign in</h2>
    <div class="container">

            <form method="POST" action="{{route('login')}}">
                @csrf{{--protection de formulaire contre les attaques d'injection--}}
                <div class="mb-6">
                  <label for="exampleInputEmail1" class="form-label">Email address <i class="fas fa-envelope fa-1x"></i></label>
                  <input style="width: 37%"; type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                  value="{{old('email')}}" required autocomplete="email" autofocus>

                </div>
                <div class="mb-6">
                  <label for="exampleInputPassword1" class="form-label">Password <i class="fas fa-lock fa-1x"></i></label>
                  <input style="width: 37%"; type="password" class="form-control" name="password" id="exampleInputPassword1" required autocomplete="password">
                  <div id="passwordHelp" class="form-text">Keep your password private</div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <div class=" form-check form-switch col-md-3 mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="remember" name="remember" {{old('remember')? 'cheked':''}}>
                        <label class="form-check-label" for="remember">remember me</label>
                    </div>
                    <div class=" mb-3 text-left">
                            <a href="">Forgot password?</a>
                    </div>
                </div>
                <div class="mb-6 mt-4">
                    <button  type="submit" class="btn btn-primary">Submit</button>
                </div>
                <p class="mt-3 text-muted">If you don't have any account, <a href="{{route('register')}}" class="">click here</a></p>

                @error('email'){{--ici cette erreur est liée à une incompatibilité de mot de passe avec celle de la base de données--}}
                <div style="width: 37%"; class="alert alert-danger text-center" role="alert">
                   <span class="clignotant"> {{$message}} </span>
                </div>

                @if(Session::has('success'))
                    <div  class="alert alert-success text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
                        {{(Session::get('success'))}}
                    </div>
                @endif
                @enderror

                    @error('password'){{--ici cette erreur est liée à une incompatibilité de mot de passe avec celle de la base de données--}}
                        <div style="width: 37%"; class="alert alert-danger text-center" role="alert">
                           <span class="clignotant"> {{$message}} </span>
                        </div>
                    @enderror

              </form>

    </div>
@endsection

{{--aria-describedby="emailHelp" ici on a la classe qui renvoie les petites erreurs liées aux mails tel que le @ manquant

    autofocus il reste sur la barre à remplir

    {{old('remember')? 'cheked':''}}




--}}
