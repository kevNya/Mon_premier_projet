@extends('welcome')

@section('title', 'Register')

@section('content')

    <div class="d-flex justify-content-between">
        <h1 style=" margin-left: 1%"; class="text-muted"> Delete patient </h1>
        <h5 class="text-danger clignotant">Please enter patient name and code for deletion</h5>
        <div  class="search-container text-end mt-3 ml-3">
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
    <div class="custome-container">
        <div class="row">
            <div class="col-md-6 ">
                <form method="POST" action="{{route('page_supprime2_patient')}}" class="row g-4" >
                    @csrf
                    <div class="col-md-6">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control" id="code" name="code" value="{{old('code')}}" required autocomplete="code" >
                        <small class="text-danger" id="error-code"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="Nom" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Nom" name="Nom" value="{{old('Nom')}}" required autocomplete="Nom">
                        <small class="text-danger" id="error-Nom"></small>
                    </div>

                    <div class="col-md-6 text-muted">
                        <label for="fds" class="form-label">Age</label>
                        <input type="text" class="form-control"  readonly>
                        <small class="text-danger" id="sdf"></small>
                    </div>
                    <div class="col-md-6 text-muted">
                        <label for="sexea" class="form-label">Sexea <i class="fas fa-venus fa-1x"></i><i class="fas fa-mars fa-1x"></i></label>
                        <input type="text" class="form-control"  value="{{old('sexea')}}" required autocomplete="sexea" readonly>
                        <small class="text-danger" id="error-sexea"></small>
                    </div>
                    <div class="col-md-9 text-muted">
                        <label for="telephonea" class="form-label">TelePhonea number <i class="fas fa-telephonea fa-1x"></i></label>
                        <input type="number" class="form-control"  value="{{old('telephonea')}}" required autocomplete="telephonea" readonly>
                        <small class="text-danger" id="error-telephonea"></small>
                    </div>
                    <div class="col-md-12 text-muted">
                        <label for="emailpata" class="form-label">Email adressea <i class="fas fa-envelope fa-1x"></i></label>
                        <input type="emailpata" class="form-control"  value="{{old('emailpata')}}" required autocomplete="emailpata" readonly >
                        <small class="text-danger" id="error-emailpata"></small>
                    </div>
                    <div class="col-md-12 text-muted">
                        <label for="adressea" class="form-label">adressea <i class="fas fa-map-marker fa-1x"></i></label>
                        <input  type="text" class="form-control"  value="{{old('adressea')}}" required autocomplete="adressea" readonly>
                        <small class="text-danger" id="error-adressea"></small>
                    </div>


                    <div class="mb-6 mt-5">
                        <button  type="submit" class="btn btn-primary" id="register-patient">Submit</button>

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
