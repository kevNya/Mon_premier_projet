@extends('welcome')

@section('title', 'liste_deresult_trié')
@section('content')
<div class="d-flex justify-content-between">
    <h1 style=" margin-left: 1%"; class="text-muted">Results List </h1>
    <div  class="search-container text-end mt-3 ml-3">
        <form method="POST" action="{{route('page_listresultrechercher')}}"  id="form-register">
            @csrf
        <input type="text" class="search-bar" name="recherc" placeholder="Insert exam code...">
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


    @if(count($lesresultsrech) > 0)
        <table class="table mt-4">
            <thead>
                <tr class="text-center">
                    <th>Code of result</th>
                    <th>Result</th>
                    <th>Exam code </th>
                    <th>Patient name</th>
                    <th>Patient code</th>

                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach($lesresultsrech as $rdv)
                    <tr class="text-center">
                        <td>{{ $rdv->resultat_id }}</td>
                        <td>{{ $rdv->description}}</td>
                        <td>{{ $rdv->id_examen }}</td>
                        <td>{{ $rdv->resultexam->examenech->echpatient->nom }}</td>
                        <td>{{ $rdv->resultexam->examenech->echpatient->patient_id }}</td>
                        <!-- Ajoutez d'autres colonnes si nécessaire -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <div  class="alert alert-danger text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
        <strong>This result does not exist</strong>
   </div>
    @endif
</div>
@endsection
