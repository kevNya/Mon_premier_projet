<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Examen;
class ExamController extends Controller
{
    //

    protected $request;

    public function __construct(Request $request)
    {
        $this->request=$request;
    }

    public function indexexam()
    {
        $lesexams= Examen::orderBy('Date_h_manipulation','asc')->with('examenech')->get();
        return view('exam.examlist',compact('lesexams'));
    }

    public function rechercherexam()
    {
        $code = $this->request->input('recher');
        $lesexamsrech= Examen::where('examen_id',$code)->get();
        return view('exam.examrechearch',compact('lesexamsrech'));
    }

    public function afficheexam()
    {
        return view('exam.gestionexam');
    }

    public function examcreer(Request $request)
    {

        $exam = $this->request->input('examen');
        $validateData = $request->validate([
            'examen_id'=>'required|numeric',
            'echantillon_id'=>'required|numeric',
            'nom_examen'=>'required|string',
            'Date_h_manipulation'=> 'required|date_format:Y-m-d\TH:i',
            'commentaire'=>'required|string',

        ]);
        $data = $request->only([
            'examen_id',
            'echantillon_id',
            'nom_examen',
            'Date_h_manipulation',
            'commentaire',

        ]);
        try
        {
            Examen::create($data);
            $codexam = $this->request->input('examen_id');

            return redirect()->route('page_affichexam')->with('success', 'The exam with code '.$codexam.' has been created succesfuly!');
        }catch(\Illuminate\Database\QueryException $e)
        {
            return redirect()->route('page_affichexam')->with('danger', 'You have an error in yours Datas ');
        }
    }

    public function affichedeleteexam()
    {
        return view('exam.deleteexam');
    }

    public function supprimeexam()
    {
        $codesupexam= $this->request->input('examen_id');
        $nomexam= $this->request->input('nom_examen');


        $supexam = Examen::where('examen_id',$codesupexam)
                          ->where('nom_examen',$nomexam)
                          ->first();
        if (!$supexam) {
                            // Gérer le cas où le patient n'est pas trouvé
            return redirect()->route('page_affichedeleteexam')->with('danger', 'The Exam code and title do not match please retry.');
        }
        try
        {

            $supexam->delete();
            return redirect()->route('page_affichedeleteexam')->with('success', 'Deletion was successful');
        }catch(\Illuminate\Database\QueryException $e)
        {
            return redirect()->route('page_affichedeleteexam')->with('danger', 'This exam can not be delete, delete his reults first');
        }


    }

    public function afficheupdateexam()
    {
        return view('exam.update1exam');
    }

    public function rechByCode(Request $request)
    {
        $codepat= $request->input('examen_id');
        $dataExam= Examen::where('examen_id',$codepat)->first();

        if ($dataExam) {
            return view('exam.update2exam', compact('dataExam'));
        } else {
            // Gestion du cas où le patient n'est pas trouvé
            return redirect()->route('page_afficheupdateexam')->with('danger', 'this exam does not exist.');
        }
    }

    public function examchanger(Request $request)
    {
        $echanrech = $request->input('examen_id');

        try {
            // Utilisez la méthode findOrFail pour obtenir l'échantillon à mettre à jour
            $updateechrech = Examen::findOrFail($echanrech);

            $validateData = $request->validate([
                'examen_id'=>'required|numeric',
                'echantillon_id'=>'required|numeric',
                'nom_examen'=>'required|string',
                'Date_h_manipulation'=> 'required|date_format:Y-m-d\TH:i',
                'commentaire'=>'required|string',
            ]);
            $data = $request->only([
                'examen_id',
                'echantillon_id',
                'nom_examen',
                'Date_h_manipulation',
                'commentaire',

            ]);

            $updateechrech->update($data);

            return redirect()->route('page_afficheupdateexam')->with('success', 'The exam : ' . $updateechrech->examn_id . ' has been modified!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('page_afficheupdateexam')->with('danger', 'Something does not match. Please check carefully.');
        }
    }

}
