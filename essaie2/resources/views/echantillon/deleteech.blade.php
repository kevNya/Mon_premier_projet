@extends('welcome')

@section('title', 'Delete_sample')

@section('content')

    <div class="d-flex justify-content-between">
        <h1 style=" margin-left: 1%"; class="text-muted"> Delete new sample </h1>
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
                <form method="POST" action="{{route('page_deleteech')}}" class="row g-4" id="form-register-patient">
                    @csrf
                    <div class="col-md-6 ">
                        <label for="echid" class="form-label">Code of sample</label>
                        <input type="number" class="form-control" id="echid" name="echid" value="{{old('echid')}}" required autocomplete="echid" autofocus>
                        <small class="text-danger" id="error-nom"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="patid" class="form-label">Patient code </label>
                        <input type="number" class="form-control" id="patid" name="patid" value="{{old('patid')}}"
                            required autocomplete="patid" title="This code must automatically correspond to a patient" >
                        <small class="text-danger" id="error-patid"></small>
                    </div>

                    <div class="col-md-12 text-muted">
                        <label for="examen" class="form-label">Exams</label>
                        <input type="text" class="form-control" id="examen" name="examen" value="{{old('examen')}}" required autocomplete="examen" readonly autofocus>
                        <small class="text-danger" id="error-examen"></small>
                    </div>
                    <div class="col-md-6 text-muted ">
                        <label for="Date_h_reception" class="form-label">Time <i class="fas fa-clock fa-1x"></i></i></label>
                        <input type="datetime-local" class="form-control" id="Date_h_reception" name="Date_h_reception" value="{{old('Date_h_reception')}}" readonly required autocomplete="Date_h_reception" autofocus>
                        <small class="text-danger" id="error-Date_h_reception"></small>
                    </div>
                    <div class="col-md-12 text-muted">
                        <label for="commentaire" class="form-label">Comment </label>
                        <input type="text" style="height: 10em; vertical-align: top;" class="form-control" id="commentaire" name="commentaire" value="NULL" readonly placeholder="NULL..." required autocomplete="commentaire" autofocus>
                        <small class="text-danger" id="error-commentaire"></small>
                    </div>
                    <div class="col-md-6">

                    </div>



                    <div class="mb-6 mt-5">
                        <button  type="submit" class="btn btn-primary" id="register-patient">Register</button>

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

                            <a href="{{route('page_afficheech')}}" class=" text-decoration-none changecolore">
                                <h2 class="text-center">Create   <i class="fas fa-vial text-primary center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="card-sm mb-1 text-center " >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_afficheupdateechFDEZQFDSQSQSQ')}}" class=" text-decoration-none changeupdate">
                                <h2 >Update<i class="fas fa-pencil-alt text-warning center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="card-sm mb-1 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_affichedeleteech')}}" class=" text-decoration-none changedelete">
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
