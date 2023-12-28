@extends('welcome')

@section('title', 'Admin_Session')
@section('content')

    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between">
                <h1 style=" margin-left: 1%"; class="text-muted">Manage users</h1>
                <div  class="search-container text-end mt-3 ml-3">
                    <form method="POST" action="{{route('page_trienom')}}">
                        @csrf
                    <input type="text" class="search-bar" name="rechusers" placeholder="Insert name user...">
                    <button type="submit" class="search-button changecolore">
                        <i class="fas fa-search fa-1x"></i>
                    </button>
                </form>
                </div>
                <div  class="search-container text-end mt-3 mr-3">
                    <form method="GET" action="{{route('page_membres')}}" >
                    <button type="submit" class="btn btn-primary changecolore">
                       show only member
                    </button>
                    </form>
                </div>
                <div  class="search-container text-end mt-3 mr-3">
                    <form method="GET" action="{{route('page_leschoix')}}" >
                    <button type="submit" class="btn btn-primary changecolore">
                       all users
                    </button>
                    </form>
                </div>
                <div  class="search-container text-end mt-3 mr-3">
                    <form method="GET" action="{{route('page_addmembre')}}" >
                    <button type="submit" class="btn btn-primary changecolore">
                       Add member
                    </button>
                    </form>
                </div>
                <div  class="search-container text-end mt-3 mr-3">
                    <form method="GET" action="{{route('page_gererrole')}}" >
                    <button type="submit" class="btn btn-primary changecolore">
                       grant roles
                    </button>
                    </form>
                </div>
            </div>
            <div class="container">


                @if(count($lesusers) > 0)
                    <table class="table mt-4">
                        <thead>
                            <tr class="text-center">
                                <th>Id users</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Membre</th>


                                <!-- Ajoutez d'autres colonnes si nécessaire -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lesusers as $rdv)
                                <tr class="text-center">
                                    <td>{{ $rdv->id  }}</td>
                                    <td>{{ $rdv->name}}</td>
                                    <td>{{ $rdv->email  }}</td>
                                    <td> @if($rdv->membre == "1")
                                        Oui
                                    @else
                                        Non
                                    @endif </td>

                                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                @else
                <div  class="alert alert-danger text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
                    <strong>This user does not exist</strong>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection
