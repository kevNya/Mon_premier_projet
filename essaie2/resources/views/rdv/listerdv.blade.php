@extends('welcome')

@section('title', 'listederendez-vous')
@section('content')
<div class="container">


    <div class="d-flex justify-content-between mt-3 mb-4">
        <h1 style=" margin-left: 1%"; class="text-muted">Appointment List </h1>

        <div  class="search-container d-flex justify-content-between text-end mt-3 mr-3">
            <form method="GET" action="{{route('rendezvous.index')}}" >
                <button type="submit" class="btn btn-primary mr-2 changecolore">Daily date</button>
            </form>
            <form method="GET" action="{{route('rendezvousall.index')}}" >
                <button type="submit" class="btn btn-primary changecolore">All date</button>
            </form>
        </form>
        </div>
    </div>

    @if(count($rendezvous) > 0)
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>Date</th>
                    <th>Hour</th>
                    <th>Patient name</th>
                    <th>Patient firstname</th>
                    <th>Code </th>
                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach($rendezvous as $rdv)
                    <tr class="text-center">
                        <td>{{ $rdv->date }}</td>
                        <td>{{ $rdv->heure }}</td>
                        <td>{{ $rdv->nom_patient }}</td>
                        <td>{{ $rdv->prenom }}</td>
                        <td>{{ $rdv->id }}</td>
                        <!-- Ajoutez d'autres colonnes si nécessaire -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Not appointment yet</p>
    @endif
</div>
@endsection
