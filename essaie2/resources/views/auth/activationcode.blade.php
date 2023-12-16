@extends('welcome')

@section('title', 'Activation_code')
@section('content')

<h2 style="margin-left: 1%"; class="text-muted"> Account activation</h2>
<div class="container">

    <div class="row">
        <div class="col-md-4 mx-auto mt-5">

            <form method="POST" action="{{route('page_activation',['token'=>$token])}}" >

                @csrf{{--protection de formulaire contre les attaques d'injection--}}
                <div class="mb-3">
                  <label for="activcod" class="form-label text-center">Activation code</label>
                  <input style="width: 100%"; type="text" name="activcod" class="form-control" id="activcod" value="{{old('activcod')}}">

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="">Change your email adress</a>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{route('page_resendcode',['token'=>$token])}}">Resend the code </a>
                    </div>
                </div>
                <div class="d-grid gap-2 mt-2">
                    <button
                    class="btn btn-primary" type="submit">Activate</button>
                </div>
            </form>



        </div>

    </div>
        @if(Session::has('warning'))
            <div  class="alert alert-warning text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
                    {{(Session::get('warning'))}}
                </div>
        @endif

        @if(Session::has('danger'))
            <div  class="alert alert-danger text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
                    {{(Session::get('danger'))}}
                </div>
        @endif
        @if(Session::has('success'))
            <div  class="alert alert-success text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
                    {{(Session::get('success'))}}
                </div>
        @endif

    @endsection
