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

    @include('alert')
@endsection
