@extends('welcome')

@section('title', 'Register')

@section('content')

    <div class="d-flex justify-content-between">
        <h1 style=" margin-left: 1%"; class="text-muted"> update new patient </h1>
        <div  class="search-container text-end mt-3 ml-3">
        </form>
        </div>
        <div  class="search-container text-end mt-3 mr-3">
            <form method="GET" action="" >
            <button type="submit" class="btn btn-primary changecolore">
            Menu
            </button>
        </form>
        </div>
    </div>
    <div class="custome-container">
        <div class="row">
            <div class="col-md-6 ">
                <form method="POST" action="{{route('page_updatpatient2')}}" class="row g-4" id="form-register-patient">
                    @csrf
                    <div class="col-md-6">
                        <label for="co" class="form-label">Patient Code</label>
                        <input type="text" class="form-control" id="co" name="co" value="{{$dataPat->patient_id}}" required autocomplete="co"  readonly>
                        <small class="text-danger" id="error-co"></small>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{$dataPat->nom}}" required autocomplete="nom" autofocus >
                        <small class="text-danger" id="error-nom"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">First name</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{$dataPat->prenom}}" required autocomplete="prenom" autofocus>
                        <small class="text-danger" id="error-prenom"></small>
                    </div>

                    <div class="col-md-6">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{$dataPat->age}}" required autocomplete="age" autofocus>
                        <small class="text-danger" id="error-age"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="sexe" class="form-label">Sexe <i class="fas fa-venus fa-1x"></i><i class="fas fa-mars fa-1x"></i></label>
                        <input type="text" class="form-control" id="sexe" name="sexe" value="{{$dataPat->sexe}}" required autocomplete="sexe" autofocus>
                        <small class="text-danger" id="error-sexe"></small>
                    </div>
                    <div class="col-md-9">
                        <label for="telephone" class="form-label">TelePhone number <i class="fas fa-telephone fa-1x"></i></label>
                        <input type="number" class="form-control" id="telephone" name="telephone" value="{{$dataPat->telephone}}" required autocomplete="telephone" autofocus>
                        <small class="text-danger" id="error-telephone"></small>
                    </div>
                    <div class="col-md-12">
                        <label for="emailpat" class="form-label">Email adresse <i class="fas fa-envelope fa-1x"></i></label>
                        <input type="emailpat" class="form-control" id="emailpat" name="emailpat" value="{{$dataPat->emailpat}}" required autocomplete="emailpat" url-emailpatExist="{{route('page_existEmail')}}" token="{{ csrf_token() }}" >
                        <small class="text-danger" id="error-emailpat"></small>
                    </div>
                    <div class="col-md-12">
                        <label for="adresse" class="form-label">adresse <i class="fas fa-map-marker fa-1x"></i></label>
                        <input  type="text" class="form-control" id="adresse" name="adresse" value="{{$dataPat->adresse}}" required autocomplete="adresse" autofocus>
                        <small class="text-danger" id="error-adresse"></small>
                    </div>

                    <div class=" col-md-12 text-end ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="agreed" name="agreed">
                            <label class="form-check-label " for="agreed"> If these informations are correct click here</label> <br>
                            <small class="text-danger fw-bold clignotant" id="error-agreed"></small>
                       </div>
                    </div>
                    <div class="mb-6 mt-5">
                        <button  type="button" class="btn btn-primary" id="register-patient">Register</button>

                    </div>
                    <div>

                        <br>
                    </div>
                </form>

            </div>
            <div class="col-md-6 " >
                <div class="row">
                <div class="col-md-4 " >
                    <div class="card-sm mb-1 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_createpatient')}}" class=" text-decoration-none changecolore">
                                <h2 class="text-center">Create   <i class="fas fa-user text-primary center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="card-sm mb-1 text-center " >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_viewupdatpatient')}}" class=" text-decoration-none changeupdate">
                                <h2 >Update<i class="fas fa-pencil-alt text-warning center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="card-sm mb-1 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_supprimepatient')}}" class=" text-decoration-none changedelete">
                                <h2 >Delete<i class="fas fa-trash-alt text-danger fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 ">
                    @include('alert')
                </div></div>
            </div>
        </div>
    </div>
@endsection
