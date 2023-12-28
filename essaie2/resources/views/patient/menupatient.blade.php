@extends('welcome')

@section('title', 'Menu_Patient')
@section('content')
    <h1 style=" margin-left: 1%">Menu</h1>
    <div class="container text-center">
        @include('alert')
        <div class="row mt-5">
            <div class="col">
                <div class="col-md-10" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_createpatient')}}" class=" text-decoration-none changecolore">
                                <h2 >Patient<i class="fas fa-user text-primary center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>
                        <div class="text-center">
                            <p>Patient details, add new patient, update...</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-10 mt-5" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_afficheech')}}" class=" text-decoration-none changecolore">
                                <h2 >Sample<i class="fas fa-vial center text-danger fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>
                        <div class="text-center">
                            <p>Details samples </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-10 mt-5" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_affichexam')}}" class=" text-decoration-none changecolore">
                                <h2 >Exam<i class="fas fa-microscope text-success center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>
                        <div class="text-center">
                            <p >Exams details </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-10 mt-5" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_afficheresult')}}" class=" text-decoration-none changecolore">
                                <h2 >Results<i class="fas fa-folder text-warning center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>
                        <div class="text-center">
                            <p>Details about resultats </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col-md-10" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_listpatient')}}" class=" text-decoration-none changecolore">
                                <h2 >Patients List<i class="fas fa-list center text-dark fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>
                        <div class="text-center">
                            <p>You can find all the patients there </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-10 mt-5" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_listech')}}" class=" text-decoration-none changecolore">
                                <h2 >Samples List<i class="fas fa-list text-dark center fa-1x  dashboard-icon"></i></h2>

                            </a>
                        </div>
                        <div class="text-center">
                            <p>Find all the samples  </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-10 mt-5" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_listexam')}}" class=" text-decoration-none changecolore">
                                <h2 >Exams List<i class="fas fa-list text-dark fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>
                        <div class="text-center">
                            <p>Find all the exams  </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-10 mt-5" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_listresult')}}" class=" text-decoration-none changecolore">
                                <h2 >Results List<i class="fas fa-list text-dark center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>
                        <div class="text-center">
                            <p>Find all the results </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-10 mt-5" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 60px;" class="card-header ">

                            <a href="{{route('page_rechresult_patient')}}" class=" text-decoration-none changecolore">
                                <h2 >Download Results <i class="fas fa-file text-dark center fa-1x dashboard-icon"></i></h2>

                            </a>
                        </div>
                        <div class="text-center">
                            <p>Find all the results of one patient</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
