<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row d-flex justify-content-between">
        <div class="col-md-6">
        <h1>LABX-Zed</h1>
        </div>
        <div class="col-md-2 text-end mt-3 mr-3">

        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                @foreach ( $lesresults as $rdv )
                @endforeach(count($lesresults) > 0)
                    <h5><strong>Mme/Mr : </strong>{{$rdv->resultexam->examenech->echpatient->nom}} {{$rdv->resultexam->examenech->echpatient->prenom}}{{--}}  {{$lepatient->prenom}}  {{$lepatient->nom}}  {{$lepatient->prenom}}  {{$lepatient->nom}}  {{$lepatient->nom}}--}}</p>
                    <p><strong>Sex : </strong>{{$rdv->resultexam->examenech->echpatient->sexe}}</p>
                    <p><strong>Age : </strong>{{$rdv->resultexam->examenech->echpatient->age}}</p>
                    <p><strong>phone : </strong>{{$rdv->resultexam->examenech->echpatient->telephone}}</p>
                    <p><strong>Address : </strong>{{$rdv->resultexam->examenech->echpatient->adresse}}</h5>



            </div>
            <div  style="float: right; margin-top:-12em">
                <strong><p > Dr : Anicet Ntang</p></strong>
                <strong><p> Biologiste</p></strong>
            </div>
            <br>
            <br>
            <div class="col-md-12 text-center mt-5">
                <strong><h2> EXAMS RESULTS : </h2></strong>
            </div>
            <div class="col-md-12 d-flex justify-content-between table-center">
              @if(count($lesresults) > 0)
            <table style="width: 70%;" class=" text-center table table-bordered mx-auto table-dark mt-3 ">
                <thead>
                    <tr class="text-center">
                        <th style="width: 30%;">Exam</th>
                        <th >Result</th>



                        <!-- Ajoutez d'autres colonnes si nécessaire -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($lesresults as $rdv)
                        <tr class="text-center">
                            <td style="height:5em" class="text-center" >{{ $rdv->resultexam->nom_examen  }}</td>
                            <td class="text-center">{{ $rdv->description}}</td>



                            <!-- Ajoutez d'autres colonnes si nécessaire -->
                        </tr>
                    @endforeach
                    <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                </tbody>
            </table>
            @else
                <div  class="alert alert-danger text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
                    <strong>This user does not exist</strong>
                </div>
            @endif
            </div>


        </div>
            <div class="col-md-12 text-end mt-5">
            </div>
            <div class="col-md-12 text-end mt-5">
            </div>
            <div class="col-md-12 text-end mt-5">
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-12 mt-5" style="float: right;">
                <strong><p> Fait à:______________ le__/___/_______signature               </p></strong>
            </div>
    </div>

</body>
</html>
