@extends('welcome')

@section('title', 'liste_dechantillon_triée')
@section('content')
<div class="d-flex justify-content-between">
    <h1 style=" margin-left: 1%"; class="text-muted">Samples List </h1>
    <div  class="search-container text-end mt-3 ml-3">
        <form method="POST" action="{{route('page_listechrechercher')}}"  id="form-register">
            @csrf
        <input type="text" class="search-bar" name="recherche" placeholder="Insert code sample...">
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


    @if(count($echrechercher) > 0)
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Patient Name</th>
                    <th>The exams</th>
                    <th>sample receipt</th>
                    <th>comment</th>

                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach($echrechercher as $rdv)
                    <tr>
                        <td>{{ $rdv->echantillon_id }}</td>
                        <td>{{ $rdv->echpatient->nom }}</td>
                        <td>{{ $rdv->examen }}</td>
                        <td>{{ $rdv->Date_h_reception }}</td>
                        <td>{{ $rdv->commentaire }}</td>
                        <!-- Ajoutez d'autres colonnes si nécessaire -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <div  class="alert alert-danger text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
        <strong>This sample does not exist</strong>
   </div>
    @endif
</div>
@endsection
