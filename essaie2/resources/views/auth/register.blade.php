@extends('welcome')

@section('title', 'Register')

@section('content')
<h2 style=" margin-left: 1%"; class="text-muted" >  Create your account  </h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <form method="POST" action="{{route('register')}}" class="row g-4" id="form-registerss">
                    @csrf
                    <div class="col-md-6">
                        <label for="firstname" class="form-label">First name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{old('firstname')}}" required autocomplete="firstname" autofocus>
                        <small class="text-danger" id="id-register-firstname"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="lastname" class="form-label">Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{old('lastname')}}" required autocomplete="lastname" autofocus>
                        <small class="text-danger" id="id-register-lastname"></small>
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="form-label">Email address <i class="fas fa-envelope fa-1x"></i></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required autocomplete="email"
                        url_emailExist="{{route('page_existEmail')}}" token="{{ csrf_token() }}" >
                        <small class="text-danger" id="error-email"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password <i class="fas fa-lock fa-1x"></i></label>
                        <input  type="password" class="form-control" id="password" name="password" value="{{old('password')}}" required autocomplete="password" autofocus>
                        <div id="passwordHelp" class="form-text">Keep your password private</div>
                        <small class="text-danger" id="error-password"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="controlpassword" class="form-label">Control Password</label>
                        <input  type="password" class="form-control" id="controlpassword" name="controlpassword" value="{{old('controlpassword')}}" required autocomplete="controlpassword" autofocus>
                        <small class="text-danger" id="error-controlpassword"></small>
                    </div>
                    <div class=" col-md-12 ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="agree">
                            <label class="form-check-label " for="agree"> Accept conditions</label> <br>
                            <small class="text-danger fw-bold clignotant" id="error-agree"></small>
                       </div>
                    </div>
                    <div class="mb-6 mt-5">
                        <button  type="button" class="btn btn-primary" id="register-user">Register</button>

                    </div>
                    <p class="mt-3 mb-10 text-muted text-center">Already have an account? <a href="{{route('login')}}" class="">click here </a> to connect</p>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection


{{-- value="{{old('firstname')}} lui il va permettre de réafficher le prénom en cas d'erreur d'un autre champ --}}
