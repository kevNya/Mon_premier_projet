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
                <div class="row ">
                    <div class="col-md-6 ">
                        <form method="POST" action="{{route('page_ajoutrole')}}" class="row g-4" >
                            @csrf
                            <div class="col-md-6">
                                <label for="id_user" class="form-label">User code</label>
                                <input type="text" class="form-control" id="id_user" name="id_user" value="{{old('id_user')}}" required autocomplete="id_user" autofocus>
                                <small class="text-danger" id="error-id_user"></small>
                            </div>
                                <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label for="name">Role</label>
                                            <select class="form-control" id="name" name="name" aria-placeholder="">
                                                <option ></option>
                                                <option value="accueil" >Welcome</option>
                                                <option value="labo" >Laboratory</option>
                                                <option value="stock" >Stock manage</option>
                                                <option value="assist" >Reception</option>
                                                <option value="admin" >Admin</option>


                                            </select>
                                        </div>
                                </div>
                            <div  class="search-container  mt-3 mr-3">

                                    <button type="submit" class="btn btn-success changecolore">
                                        submit
                                    </button>

                            </div>

                        </form>
                    </div>
                </div>
            </div> @include('alert')
            <div class="container">
                @if(count($lesroles) > 0)
                    <table class="table mt-4">
                        <thead>
                            <tr class="text-center">
                                <th>Role code</th>
                                <th>role</th>
                                <th>User code</th>
                                <th>User name</th>


                                <!-- Ajoutez d'autres colonnes si nécessaire -->
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($lesroles as $rdv)
                                <tr class="text-center">
                                    <td>{{ $rdv->id }}</td>
                                    <td>{{ $rdv->name }}</td>
                                    <td>{{ $rdv->id_user }}</td>

                                    <td>{{ $rdv->roleuser->name  }}</td>
{{----}}
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
    </div>

@endsection
