<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Echantillon;
class EchantillonController extends Controller
{
    //
    protected $request;
    function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function indexech() //récupération des rendez-vous par ordre de date croissante
    {

        $lesechantillons = Echantillon::orderBy('Date_h_reception', 'desc')->with('echpatient')->get(); //echpatient est la méthode dans le model échantillon qui part prendre le patient qui correspond à l'échantillon
        return view('echantillon.echantillonlist', compact('lesechantillons'));
    }
    public function rechercherech(){
        $codeentrant = $this->request->input('recherche');
        $echrechercher= Echantillon::where('echantillon_id',$codeentrant)->get();
        return view('echantillon.echantillonrechearch', compact('echrechercher'));
    }

    public function afficheech()
    {
        return view('echantillon.gestionechantillon');
    }

    public function echcreer(Request $request)
    {

        $exam = $this->request->input('examen');
        $validateData = $request->validate([
            'echantillon_id'=>'required|numeric',
            'patient_id'=>'required|numeric',
            'examen'=> 'required|string',
            'Date_h_reception'=>'required',
            'commentaire'=>'required|string',

        ]);
        try
        {
            $newech = Echantillon::create($validateData);
            $codech = $this->request->input('echantillon_id');
            $nompat= $newech->echpatient->nom;
            return redirect()->back()->with('success', 'The sample belongs to the patient '.$nompat.' with code '.$codech.' has been created succesfuly!');
        }catch(\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('danger', 'You have an error in yours Datas ');
        }


    }
    public function affichedeleteech()
    {
        return view('echantillon.deleteech');
    }

    public function supprimeech()
    {
        $codesupech= $this->request->input('echid');
        $codesuppat= $this->request->input('patid');



        $supech = Echantillon::where('echantillon_id',$codesupech)
                          ->where('patient_id',$codesuppat)
                          ->first();
        if (!$supech) {
                            // Gérer le cas où le patient n'est pas trouvé
            return redirect()->route('page_affichedeleteech')->with('danger', 'The Exam code and patient code do not match please retry.');
        }
        try
        {

            $supech->delete();
            return redirect()->route('page_affichedeleteech')->with('success', 'Deletion was successful');
        }catch(\Illuminate\Database\QueryException $e)
        {
            return redirect()->route('page_affichedeleteech')->with('danger', 'This sample can not be delete, delete his exams first');
        }


    }

    public function afficheupdateech()
    {
        return view('echantillon.update1ech');
    }

    public function rechByCode(Request $request)
    {
        $codepat= $request->input('echantillon_id');
        $dataEch= Echantillon::where('echantillon_id',$codepat)->first();

        if ($dataEch) {
            return view('echantillon.update2ech', compact('dataEch'));
        } else {
            // Gestion du cas où le patient n'est pas trouvé
            return redirect()->route('page_afficheupdateech')->with('danger', 'this sample does not exist.');
        }
    }

    public function echchanger(Request $request)
    {
        $echanrech = $request->input('echantillon_id');

        try {
            // Utilisez la méthode findOrFail pour obtenir l'échantillon à mettre à jour
            $updateechrech = Echantillon::findOrFail($echanrech);

            $validateData = $request->validate([
                'echantillon_id' => 'required|numeric',
                'patient_id' => 'required|numeric',
                'examen' => 'required|string',
                'Date_h_reception' => 'required',
                'commentaire' => 'required|string',
            ]);

            $updateechrech->update($validateData);

            return redirect()->route('page_afficheupdateechFDEZQFDSQSQSQ')->with('success', 'The sample : ' . $updateechrech->echantillon_id . ' has been modified!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('page_afficheupdateechFDEZQFDSQSQSQ')->with('danger', 'Something does not match. Please check carefully.');
        }
    }


}
