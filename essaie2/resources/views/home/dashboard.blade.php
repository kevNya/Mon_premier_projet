
@extends('welcome')

@section('title', 'Dashboard')
@section('content')
    <h1 style="margin-left: 1%">Dashboard</h1>
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">

                        <a href="{{route('rendezvous.index')}}" class=" text-decoration-none changecolore">
                            <h2 >Appointment List</h2>
                            <i class="fas fa-calendar-alt center fa-5x dashboard-icon"></i>
                        </a>
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <p>The daily appointment list can be found here </p>
                        <i class="fas text-end fa-list text-primary"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">

                        <a href="{{route('menupatient')}}" class=" text-decoration-none changecolore">
                            <h2>Ours Patients</h2>
                            <i class="fas fa-users fa-5x dashboard-icon"></i>
                        </a>
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <p>Find informations about all the patients </p>
                        <i class="fas text-end fa-folder text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">

                        <a href="" class=" text-decoration-none changecolore">
                            <h2>Member of Staff</h2>
                            <i class="fas fa-user fa-5x dashboard-icon"></i>
                        </a>
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <p>Would you want to contact your coworker? </p>
                        <i class="fas text-end fa-smile text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="card-header text-center">

                        <a href="" class=" text-decoration-none changecolore">
                            <h2>Billing</h2>
                            <i class="fas fa-wallet center fa-5x dashboard-icon"></i>
                        </a>
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <p>Chek payments here </p>
                        <i class="fas text-end fa-euro-sign text-success"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="card-header text-center">

                        <a href="" class=" text-decoration-none changecolore">
                            <h2>Material Mangement</h2>
                            <i class="fas fa-flask fa-5x dashboard-icon"></i>
                        </a>
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <p>Good and sufficient equipment is safety!</p>
                        <i class="fas text-end fa-chart-bar text-danger"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="card-header text-center">

                        <a href="" class=" text-decoration-none changecolore">
                            <h2>Member Staff</h2>
                            <i class="fas fa-user fa-5x dashboard-icon"></i>
                        </a>
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <p>Would you want to contact your coworker? </p>
                        <i class="fas text-end fa-chart-bar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
