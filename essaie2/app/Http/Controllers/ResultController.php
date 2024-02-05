<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use Barryvdh\DomPDF\Facade\Pdf;
class ResultController extends Controller
{
    //
    protected $request;
    public function __construct(Request $request)
    {
        $this->request=$request;
    }
    public function indexresult()
    {//schématisation de la triple jointure grace à éloquent "resultexam.examenech.echpatient" représente les différentes relation entre les models(table) dans la BD
        $lesresults= Result::orderBy('Date_h_resultat','desc')
                                ->with('resultexam.examenech.echpatient')
                                ->get();
        return view('result.resultlist',compact('lesresults'));
    }
    public function rechercherresult()
    {
        $code = $this->request->input('recherc'); //récupération du.0. code entrer via l'utilisateur
        $lesresultsrech= Result::where('resultat_id',$code)->get();
        return view('result.resultrechearch',compact('lesresultsrech'));
    }

    public function afficheresult()
    {
        return view('result.gestionresult');
    }

    public function resultcreer(Request $request)
    {

        $exam = $this->request->input('examen');//code exam entrer par l'utilisateur
        $validateData = $request->validate([//comment les champs doivent être remplis
            'id_examen'=>'required|numeric',
            'Date_h_resultat'=> 'required|date_format:Y-m-d\TH:i',
            'description'=>'required|string',

        ]);
        $data = $request->only([//dans la base de données on va spécifier les collones qui seront nécessaire car il y'a plus de colonnes
            'id_examen',
            'Date_h_resultat',
            'description',

        ]);
        try
        {
            $resultat= Result::create($data); //creation de la nouvelle insertion


            return redirect()->route('page_afficheresult')->with('success', 'The result with code '.$resultat->resultat_id.' has been created succesfuly!');
        }catch(\Illuminate\Database\QueryException $e)
        {
            return redirect()->route('page_afficheresult')->with('danger', 'this exam does not exist. Please enter the datas of this exam first ');
        }
    }

    public function affichedeleteresult()
    {
        return view('result.deleteresult');
    }

    public function supprimeresult()
    {
        $codesupresult= $this->request->input('resultat_id');//R2CUP2RATION DU CODE du résultat
        $codexam= $this->request->input('id_examen');// récupération du code de l'examen correspondant au résultat


        $supresult = Result::where('resultat_id',$codesupresult)
                          ->where('id_examen',$codexam)
                          ->first();// recherche du premier résultat correspondant  aux différents paramètres enter
        if (!$supresult) {
                            // Gérer le cas où le patient n'est pas trouvé
            return redirect()->route('page_affichedeleteresult')->with('danger', 'The Exam and result code do not match please retry.');
        }
        try
        {

            $supresult->delete();
            return redirect()->route('page_affichedeleteresult')->with('success', 'Deletion was successful');
        }catch(\Illuminate\Database\QueryException $e)//erreur liée à une erreur de requête dans la base de données
        {
            return redirect()->route('page_affichedeleteresult')->with('danger', 'please check yours datas');
        }


    }

    public function afficheupdateresult()
    {
        return view('result.update1result');
    }

    public function rechByCode(Request $request)
    {
        $codepat= $request->input('resultat_id');
        $dataResult= Result::where('resultat_id',$codepat)->first();

        if ($dataResult) {
            return view('result.update2result', compact('dataResult'));
        } else {
            // Gestion du cas où le patient n'est pas trouvé
            return redirect()->route('page_afficheupdateresult')->with('danger', 'this result does not exist.');
        }
    }

    public function resultchanger(Request $request)
    {
        $echanrech = $request->input('resultat_id');

        try {
            // Utilisez la méthode findOrFail pour obtenir l'échantillon à mettre à jour
            $updateechrech = Result::findOrFail($echanrech);

            $validateData = $request->validate([

                'Date_h_resultat'=> 'required|date_format:Y-m-d\TH:i',
                'description'=>'required|string',

            ]);
            $data = $request->only([

                'Date_h_resultat',
                'description',

            ]);

            $updateechrech->update($data);

            return redirect()->route('page_afficheupdateresult')->with('success', 'The result : ' . $updateechrech->examn_id . ' has been modified!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('page_afficheupdateresult')->with('danger', 'Something does not match. Please check carefully.');
        }
    }


}
