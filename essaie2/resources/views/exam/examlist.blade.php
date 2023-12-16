@extends('welcome')

@section('title', 'listedexamen')
@section('content')
<div class="d-flex justify-content-between">
    <h1 style=" margin-left: 1%"; class="text-muted">Exams List </h1>
    <div  class="search-container text-end mt-3 ml-3">
        <form method="POST" action="{{route('page_listexamrechercher')}}"  id="form-register">
            @csrf
        <input type="text" class="search-bar" name="recher" placeholder="Insert exam code...">
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


    @if(count($lesexams) > 0)
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Exam</th>
                    <th>receipt of sample </th>
                    <th>Handling start</th>
                    <th>Comment</th>
                    <th class="text-center">Code of sample</th>
                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach($lesexams as $rdv)
                    <tr>
                        <td>{{ $rdv->examen_id }}</td>
                        <td>{{ $rdv->nom_examen}}</td>
                        <td>{{ $rdv->examenech->Date_h_reception }}</td>
                        <td>{{ $rdv->Date_h_manipulation }}</td>
                        <td>{{ $rdv->commentaire }}</td>
                        <td class="text-center">{{ $rdv->echantillon_id }}</td>
                        <!-- Ajoutez d'autres colonnes si nécessaire -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <div  class="alert alert-danger text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
        <strong>This exam does not exist</strong>
   </div>
    @endif
</div>
@endsection
