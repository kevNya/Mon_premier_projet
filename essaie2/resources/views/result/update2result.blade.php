@extends('welcome')

@section('title', 'Update_Result')

@section('content')

    <div class="d-flex justify-content-between">
        <h1 style=" margin-left: 1%"; class="text-muted"> Edit result </h1>
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
                <form method="POST" action="{{route('page_updateresult2')}}" class="row g-4" id="form-register-patient">
                    @csrf
                    <div class="col-md-6">
                        <label for="resultat_id" class="form-label">Result code</label>
                        <input type="number" class="form-control" id="resultat_id" name="resultat_id" value="{{$dataResult->resultat_id}}" required autocomplete="resultat_id" readonly>
                        <small class="text-danger" id="error-resultat_id"></small>
                    </div>
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <label for="id_examen" class="form-label">Exam code</label>
                        <input type="number" class="form-control" id="id_examen" name="id_examen" value="{{$dataResult->id_examen}}" required autocomplete="id_examen" readonly>
                        <small class="text-danger" id="error-id_examen"></small>
                    </div>


                    <div class="col-md-6 text-muted">
                        <label for="Date_h_resultat" class="form-label">Input time</label>
                        <input type="datetime-local" class="form-control" id="Date_h_resultat" name="Date_h_resultat" value="{{$dataResult->Date_h_resultat}}" required autocomplete="Date_h_resultat" autofocus>
                        <small class="text-danger" id="error-Date_h_resultat"></small>
                    </div>

                    <div class="col-md-12 text-muted">
                        <label for="description" class="form-label">Text</label>
                        <input type="text" style="height: 10em; vertical-align: top;" class="form-control" id="description" name="description" value="{{$dataResult->description}}" required autocomplete="description" autofocus>
                        <small class="text-danger" id="error-description"></small>

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

                            <a href="{{route('page_afficheresult')}}" class=" text-decoration-none changecolore">
                                <h2 class="text-center">Create   <i class="fas fa-file text-primary center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="card-sm mb-1 text-center " >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_afficheupdateresult')}}" class=" text-decoration-none changeupdate">
                                <h2 >Update<i class="fas fa-pencil-alt text-warning center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="card-sm mb-1 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_affichedeleteresult')}}" class=" text-decoration-none changedelete">
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
