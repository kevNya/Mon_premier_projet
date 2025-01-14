@extends('welcome')

@section('title', 'Menu_Patient')
@section('content')
    <div class="display1">
       <h1 class="left-box2" style=" margin-left: 1%">Laboratory consumables</h1>
    </div>
    <style>
        .custom-margin {
            margin-top: 40px; /* Ajustez la valeur selon vos besoins */
        }
        .display1{
            display: flex;
        }
    </style>
    <div class="display1">
        <div class="left-box">
            <div class="container text-center">

                <div class="row mt-5">
                    <div class="col">
                        <div class="col-md-8 ">
                            <div class="card-sm mb-3 text-center " >
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
                            <div class="card-sm mb-3 text-center" >
                                <div style="height: 50px;" class="card-header ">
                                    <a href="#"
                             data-single-click-url="{{ route('pagedetailsMateriel',['id' =>6]) }}" {{-- --}}
                            data-double-click-url="{{ route('pageupdateMateriel',['id' =>6]) }}"
                            class=" text-decoration-none changecolore createLink">
                                        <h3><i class="fas fa-circle center fa-1x"></i></h3>
                                        <p>Petri dishes</p>
                                    </a>
                                </div>

                            </div>
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
                            <div class="card-sm mb-3 text-center " >
                                <div style="height: 50px;" class="card-header ">

                                    <a href="#"
                             data-single-click-url="{{ route('pagedetailsMateriel',['id' =>4]) }}" {{-- --}}
                            data-double-click-url="{{ route('pageupdateMateriel',['id' =>4]) }}"
                            class=" text-decoration-none changecolore createLink">
                                        <h3><i class="fas fa-hand-paper center fa-1x"></i></h3>
                                        <p>glove</p>
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
                        <div class="col-md-8 custom-margin">
                            <div class="card-sm mb-3  text-center" >
                                <div style="height: 50px;" class="card-header ">

                                    <a href="#"
                             data-single-click-url="{{ route('pagedetailsMateriel',['id' =>7]) }}" {{-- --}}
                            data-double-click-url="{{ route('pageupdateMateriel',['id' =>7]) }}"
                            class=" text-decoration-none changecolore createLink">
                                        <h3><i class="fas fa-band-aid center fa-1x"></i></h3>
                                        <p  class="mb-3" >band</p>
                                    </a>
                                </div>

                            </div>
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
        </div>
        <div class="right-box">
            <div class="row">
                <div class="col-md-10 ">
                    <form method="POST" action="{{route('pageupdateConfirmMateriel')}}" class="row g-4" id="form-update-materiel">
                        @csrf
                        <div class="col-md-18">
                            <label for="nom" class="form-label">Material name</label>
                            <input type="text" class="form-control" id="matname" name="nom" value="{{$dataMat->nom}}" required autocomplete="co"  readonly>
                            <small class="text-danger" id="error-matname"></small>
                        </div>
                        <div class="col-md-12">
                            <label for="qtite_stock" class="form-label">stock amount</label>
                            <input type="number" class="form-control" id="qtite_stock" name="qtite_stock" value="{{$dataMat->qtite_stock}}" required autocomplete="stock_amount" readonly  >
                            <small class="text-danger" id="error-qtite_stock"></small>
                        </div>
                        <div class="col-md-18">
                            <label for="quantite_ajoute" class="form-label">Add Quantity </label>
                            <input type="text" class="form-control" id="quantite_ajoute" name="quantite_ajoute"  autofocus>
                            <small class="text-danger" id="error-matname"></small>
                        </div>
                        <div class="col-md-18">
                            <label for="quantite_retire" class="form-label">Quantity Used</label>
                            <input type="text" class="form-control" id="quantite_retire" name="quantite_retire" required autocomplete="QuantityUsed"  >
                            <small class="text-danger" id="error-matname"></small>
                        </div>


                        <div class="col-md-12">
                            <label for="stock_critique" class="form-label">Critical stock</label>
                            <input type="number" class="form-control" id="stock_critique" name="stock_critique" value="{{$dataMat->stock_critique}}" required autocomplete="Critical_stock" autofocus>
                            <small class="text-danger" id="error-stock_critique"></small>
                        </div>
                        <div class="col-md-12">
                            <label for="qtite_Acommander" class="form-label">Order quantity </label>
                            <input type="number" class="form-control" id="qtite_Acommander" name="qtite_Acommander" value="{{$dataMat->qtite_Acommander}}" required autocomplete="Order_quantity" autofocus>
                            <small class="text-danger" id="error-qtite_Acommander"></small>
                        </div>
                        <div class="col-md-12">
                            <label for="date_achat" class="form-label">Date of purchase (AAAA-MM-DD)</label>
                            <input type="date" class="form-control" id="date_achat" name="date_achat" value="{{$dataMat->date_achat}}" required autocomplete="Date_of_purchase"  >
                            <small class="text-danger" id="error-date_achat"></small>
                        </div>
                        <div class="col-md-12">
                            <label for="date_peremption" class="form-label">Expiry date (AAAA-MM-DD)</label>
                            <input  type="date" class="form-control" id="date_peremption" name="date_peremption" value="{{$dataMat->date_peremption}}" required autocomplete="Expiry_date" autofocus>
                            <small class="text-danger" id="error-date_peremption"></small>
                        </div>

                        <div class=" col-md-12 text-end ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="agreed" name="agreed">
                                <label class="form-check-label " for="agreed"> If these informations are correct click here</label> <br>
                                <small class="text-danger fw-bold clignotant" id="error-agreed"></small>
                           </div>
                        </div>
                        <div class="mb-6 mt-5">
                            <button  type="submit" class="btn btn-primary" >Register</button>

                        </div>
                        <div>

                            <br>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
