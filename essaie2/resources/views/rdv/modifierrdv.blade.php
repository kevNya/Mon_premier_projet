@extends('welcome')

@section('title', 'delete_appointment')
@section('content')


    <div class="container col-md-4 mt-3">
        <h1>Change your appointment? </h1>
                @if(Session::has('success'))
                    <div  class="alert alert-success text-center  mx-auto mt-5 " role="alert">
                        {{(Session::get('success'))}}
                    </div>
                @endif
        <form method="POST" action="{{ route('page_modifierrdv2') }}">
            @csrf
            <div class="form-group mt-4">
                <label for="id">Enter your appointment code please</label>
                <input type="text" class="form-control" id="id" name="id" value="{{old('id')}}"  required>
            </div>
            <div class="form-group mb-3">
                <label for="nom">Enter your name also</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}"  required>
            </div>
            <div class="form-group mb-3">
                <label for="date">Please change the Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}" required>
            </div>

            <div class="form-group mb-3">
                <label for="heure">Change hour there</label>
                <input type="time" class="form-control" id="heure" name="heure" value="{{old('heure')}}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Send</button>
            <div class="container col-md-4 mt-3 d-flex justify-content-between">

                <a class="text-center" href="{{route('rendezvous.create')}}" >Other appointment</a>
            </div>


        </form>
        {{--@if(Session::has('rendezvousData'))
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Nom du Patient</th>
                    <th>Prénom du Patient</th>
                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach(session('rendezvousData') as $rdv)
                    <tr>
                        <td>{{ $rdv->date }}</td>
                        <td>{{ $rdv->heure }}</td>
                        <td>{{ $rdv->nom_patient }}</td>
                        <td>{{ $rdv->prenom }}</td>
                        <!-- Ajoutez d'autres colonnes si nécessaire -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Aucun rendez-vous trouvé.</p>
        @endif--}}

    </div>


    @include('alert')


@endsection
