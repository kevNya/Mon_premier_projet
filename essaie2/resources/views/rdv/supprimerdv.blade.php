@extends('welcome')

@section('title', 'delete_appointment')
@section('content')


    <div class="container col-md-4 mt-3">
        <h1>Delete your appointment? </h1>

        <form method="POST" action="{{ route('page_suppressionrdv2') }}">
            @csrf
            <div class="form-group mt-4">
                <label for="id">Enter your appointment code please</label>
                <input type="text" class="form-control" id="id" name="id" value="{{old('id')}}"  required>
            </div>
            <div class="form-group mt-4">
                <label for="nom">Enter your name also</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}"  required>
            </div>


            <button type="submit" class="btn btn-primary mt-4">Send</button>
            <div class="container col-md-4 mt-3 d-flex justify-content-between">

                <a class="text-center" href="{{route('rendezvous.create')}}" >Other appointment</a>
            </div>


        </form>


    </div>

    @if(Session::has('success'))
        <div  class="alert alert-success text-center col-md-4 mx-auto mt-5 " role="alert">
             {{(Session::get('success'))}}
        </div>
    @endif
    @if(Session::has('danger'))
        <div  class="alert alert-danger text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
             {{(Session::get('danger'))}}
        </div>
    @endif
    @if(Session::has('rendezvousData'))
        <div  class="alert alert-danger text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
             {{(Session::get('rendezvousData'))}}
        </div>
    @endif

@endsection
