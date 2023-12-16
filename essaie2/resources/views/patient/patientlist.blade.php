@extends('welcome')

@section('title', 'listedepatient')
@section('content')
<div class="d-flex justify-content-between">
    <h1 style=" margin-left: 1%"; class="text-muted">Patients List </h1>
    <div  class="search-container mt-3 ml-3">
        <form method="POST" action="{{route('page_listpatientrechercher')}}"  id="form-register">
            @csrf
        <input type="text" class="search-bar" name="recherche" placeholder="Insert name...">
        <button type="submit" class="search-button changecolore">
            <i class="fas fa-search fa-1x"></i>
        </button>
    </form>
    </div>
    <div  class="search-container text-end mt-3 mr-3">
        <form method="GET" action="{{route('menupatient')}}" >
        <button type="submit" class="btn btn-primary changecolore">
           Menu
        </button>
    </form>
    </div>
</div>
<div class="container">


    @if(count($lespatients) > 0)
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>First name</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Code </th>

                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach($lespatients as $rdv)
                    <tr>
                        <td>{{ $rdv->nom }}</td>
                        <td>{{ $rdv->prenom }}</td>
                        <td>{{ $rdv->age }}</td>
                        <td>{{ $rdv->sexe }}</td>
                        <td>{{ $rdv->telephone }}</td>
                        <td>{{ $rdv->adresse }}</td>
                        <td>{{ $rdv->patient_id  }}</td>
                        <!-- Ajoutez d'autres colonnes si nécessaire -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div  class="alert alert-danger text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
            <strong>This patient is not in our list</strong>
        </div>
    @endif
</div>
@endsection
