@extends('welcome')

@section('title', 'create_appointment')
@section('content')

    <div class="container col-md-4 mt-3">
        <h1>Appointment schedulling</h1>
        @include('alert')
        <form method="POST" action="{{ route('rendezvous.store') }}">
            @csrf

            <div class="form-group mt-4">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}" required>
            </div>

            <div class="form-group">
                <label for="heure">Hour</label>
                <input type="time" class="form-control" id="heure" name="heure" value="{{old('heure')}}" required>
            </div>

            <div class="form-group">
                <label for="nom_patient">Name</label>
                <input type="text" class="form-control" id="nom_patient" name="nom_patient" value="{{old('nom_patient')}}"  required>
            </div>
            <div class="form-group">
                <label for="prenom">First name</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{old('prenom')}}"  required>
            </div>


            <button type="submit" class="btn btn-primary mt-4">Register</button>


        </form>


    </div>
        <div class="container col-md-4 mt-3 d-flex justify-content-between">
            <a href="{{route('page_modifierrdv')}}">Change your appointment</a>
            <a class="text-end" href="{{route('page_suppressionrdv')}}" >delete your appointment</a>
        </div>
        <div class="form-group mt-4">
        </div>


@endsection
