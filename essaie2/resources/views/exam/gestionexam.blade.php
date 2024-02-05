@extends('welcome')

@section('title', 'Register_Exam')

@section('content')

    <div class="d-flex justify-content-between">
        <h1 style=" margin-left: 1%"; class="text-muted"> Register new exam </h1>
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
                <form method="POST" action="{{route('page_afficheexamcreer')}}" class="row g-4" >
                    @csrf
                    <div class="col-md-6">
                        <label for="examen_id" class="form-label">Exam code</label>
                        <input type="number" class="form-control" id="examen_id" name="examen_id" value="{{old('examen_id')}}" required autocomplete="examen_id" autofocus>
                        <small class="text-danger" id="error-examen_id"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="nom_examen" class="form-label">Exam Title </label>
                        <input type="text" class="form-control" id="nom_examen" name="nom_examen" value="{{old('nom_examen')}}" required autocomplete="nom_examen" autofocus>
                        <small class="text-danger" id="error-nom_examen"></small>
                    </div>

                    <div class="col-md-6">
                        <label for="Date_h_manipulation" class="form-label">Time of manipulation</label>
                        <input type="datetime-local" class="form-control" id="Date_h_manipulation" name="Date_h_manipulation" value="{{old('Date_h_manipulation')}}" required autocomplete="Date_h_manipulation" autofocus>
                        <small class="text-danger" id="error-Date_h_manipulation"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="echantillon_id" class="form-label">Code of sample </label>
                        <input type="number" class="form-control" id="echantillon_id" name="echantillon_id" value="{{old('echantillon_id')}}" required autocomplete="echantillon_id" autofocus>
                        <small class="text-danger" id="error-echantillon_id"></small>
                    </div>

                    <div class="col-md-12">
                        <label for="commentaire" class="form-label">Comment </label>
                        <input type="text" style="height: 10em; vertical-align: top;" class="form-control" id="commentaire" name="commentaire" value="NULL" required autocomplete="commentaire" autofocus>
                        <small class="text-danger" id="error-commentaire"></small>

                    </div>


                    <div class="mb-6 mt-5">
                        <button  type="submit" class="btn btn-primary" >Register</button>

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

                            <a href="{{route('page_affichexam')}}" class=" text-decoration-none changecolore">
                                <h2 class="text-center">Create   <i class="fas fa-microscope text-primary center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="card-sm mb-1 text-center " >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_afficheupdateexam')}}" class=" text-decoration-none changeupdate">
                                <h2 >Edit<i class="fas fa-pencil-alt text-warning center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="card-sm mb-1 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_affichedeleteexam')}}" class=" text-decoration-none changedelete">
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
