@extends('welcome')

@section('title', 'Menu_Patient')
@section('content')
    <h1 style=" margin-left: 1%">Laboratory consumables</h1>
    <style>
        .custom-margin {
            margin-top: 30px; /* Ajustez la valeur selon vos besoins */
        }
    </style>
    <div class="container text-center">

        <div class="row mt-5">
            <div class="col">
                <div class="col-md-8" >
                    @foreach($dataMat as $datamat)
                    @if ($datamat->id == 5)
                    <div class="card-sm mb-3 text-center
                        @if ($datamat->niveau_du_stock == 1) bg-red
                        @elseif ($datamat->niveau_du_stock == 2) bg-yellow
                        @else
                        @endif" >
                        <div style="height: 50px;" class="card-header ">
                            <a href="#"
                             data-single-click-url="{{ route('pagedetailsMateriel',['id' =>5]) }}" {{-- --}}
                            data-double-click-url="{{ route('pageupdateMateriel',['id' =>5]) }}"
                            class=" text-decoration-none changecolore createLink">
                                <h3><i class="fas fa-vial center fa-1x"></i></h3>
                                <p>Tubes</p>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

                <div class="col-md-8 custom-margin">
                    <div class="card-sm mb-3  text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-syringe center fa-1x"></i></h3>
                                <p  class="mb-3"> syringe </p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-flask center fa-1x"></i></h3>
                                <p>flask</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-dna center fa-1x"></i></h3>
                                <p>DNA</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-microscope center fa-1x"></i></h3>
                                <p>microscope</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">
                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-vials center fa-1x"></i></h3>
                                <p>Collection tube</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col-md-8" >
                    @foreach($dataMat as $datamat)
                    @if ($datamat->id == 6)
                    <div class="card-sm mb-3 text-center
                        @if ($datamat->niveau_du_stock == 1) bg-red
                        @elseif ($datamat->niveau_du_stock == 2) bg-yellow
                        @else
                        @endif" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="#"
                             data-single-click-url="{{ route('pagedetailsMateriel',['id' =>6]) }}" {{-- --}}
                            data-double-click-url="{{ route('pageupdateMateriel',['id' =>6]) }}"
                            class=" text-decoration-none changecolore createLink">
                                <h3><i class="fas fa-circle center fa-1x"></i></h3>
                                <p>Petri dishes </p>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col-md-8 custom-margin">
                    <div class="card-sm mb-3  text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-prescription-bottle center fa-1x"></i></h3>
                                <p  class="mb-3" >bottle</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-thermometer-half center fa-1x"></i></h3>
                                <p>thermometer</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-procedures center fa-1x"></i></h3>
                                <p>Cardiogramme</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-first-aid center fa-1x"></i></h3>
                                <p>first aid</p>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-md-8 custom-margin" >
                    @foreach($dataMat as $datamat)
                    @if ($datamat->id == 4)
                    <div class="card-sm mb-3 text-center
                        @if ($datamat->niveau_du_stock == 1) bg-red
                        @elseif ($datamat->niveau_du_stock == 2) bg-yellow
                        @else
                        @endif" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="#"
                             data-single-click-url="{{ route('pagedetailsMateriel',['id' =>4]) }}" {{-- --}}
                            data-double-click-url="{{ route('pageupdateMateriel',['id' =>4]) }}"
                            class=" text-decoration-none changecolore createLink">
                                <h3><i class="fas fa-hand-paper center fa-1x"></i></h3>
                                <p>gloves</p>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="col-md-8" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-box-open center fa-1x"></i></h3>
                                <p>box</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin">
                    <div class="card-sm mb-3  text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-vial center fa-1x"></i></h3>
                                <p  class="mb-3" >vial</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-water center fa-1x"></i></h3>
                                <p>water phy</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-ruler-horizontal center fa-1x"></i></h3>
                                <p>Test strips</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-heartbeat center fa-1x"></i></h3>
                                <p>heartbeat</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-clinic-medical center fa-1x"></i></h3>
                                <p>yes</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col-md-8" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-pills center fa-1x"></i></h3>
                                <p>pills</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    @foreach($dataMat as $datamat)
                    @if ($datamat->id == 7)
                    <div class="card-sm mb-3 text-center
                        @if ($datamat->niveau_du_stock == 1) bg-red
                        @elseif ($datamat->niveau_du_stock == 2) bg-yellow
                        @else
                        @endif" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="#"
                             data-single-click-url="{{ route('pagedetailsMateriel',['id' =>7]) }}" {{-- --}}
                            data-double-click-url="{{ route('pageupdateMateriel',['id' =>7]) }}"
                            class=" text-decoration-none changecolore createLink">
                                <h3><i class="fas fa-band-aid center fa-1x"></i></h3>
                                <p>band</p>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-scroll center fa-1x"></i></h3>
                                <p>scroll</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-lungs center fa-1x"></i></h3>
                                <p>yes</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-user center fa-1x"></i></h3>
                                <p>yes</p>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 custom-margin" >
                    <div class="card-sm mb-3 text-center" >
                        <div style="height: 50px;" class="card-header ">

                            <a href="" class=" text-decoration-none changecolore">
                                <h3><i class="fas fa-layer-group center fa-1x"></i></h3>
                                <p>filter paper</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
