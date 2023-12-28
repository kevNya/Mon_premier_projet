{{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" />--}}

@extends('welcome')

@section('title', 'Admin_Session')
@section('content')

    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between">
                <h1 style=" margin-left: 1%"; class="text-muted">Add member</h1>
                <div  class="search-container text-end mt-3 ml-3">
                    <form method="POST" action="{{route('page_trienom')}}">
                        @csrf
                    <input type="text" class="search-bar" name="rechusers" placeholder="Insert user name...">
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
        </div>

            <div class="row mt-5 ml-4">
                <div class="col-md-6 ">
                    <form method="POST" action="{{route('page_ajoutmembre')}}" class="row g-4" >
                        @csrf
                        <div class="col-md-6">
                            <label for="id_user" class="form-label">User code</label>
                            <input type="text" class="form-control" id="id_user" name="id_user" value="{{old('id_user')}}" required autocomplete="id_user" autofocus>
                            <small class="text-danger" id="error-id_user"></small>
                        </div>
                            <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label for="membre">Member ?</label>
                                        <select class="form-control" id="membre" name="membre" aria-placeholder="">
                                            <option ></option>
                                            <option value="1" >Oui</option>
                                            <option value="0" >Non</option>

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
            <div class="col-md-6 ">
                @include('alert');
            </div>
    </div>
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>--}}

@endsection
