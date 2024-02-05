<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;

use App\Models\Result;
use App\Models\patient;
use App\Models\Examen;

class PdfResultController extends Controller
{
    /**
     * Handle the incoming request.
     */
    protected $request;
    public function __construct(Request $request)
    {
        $this->request=$request;
    }
    public function __invoke()
    {
        //
        return iew(view:'');
    }

    /*public function lesaffichages()
    {
        $idpat= $this->request->input('rechpatients');
        $lesresults = Result::select('resultats.*')
        ->join('examens', 'resultats.id_examen', '=', 'examens.examen_id')
        ->join('echantillons', 'examens.echantillon_id', '=', 'echantillons.echantillon_id')
        ->join('patients', 'echantillons.patient_id', '=', 'patients.patient_id')
        ->where('patients.patient_id', '=', $idpat)
        ->orderByDesc('resultats.Date_h_resultat')
        ->get();



        return view('result.ex',compact('lesresults'));
    }*/

    public function pdfexport()
    {
        $idpat= $this->request->input('rechpatients');
        $lesresults = Result::select('resultats.*', 'patients.nom as nom_patient')
        ->join('examens', 'resultats.id_examen', '=', 'examens.examen_id')
        ->join('echantillons', 'examens.echantillon_id', '=', 'echantillons.echantillon_id')
        ->join('patients', 'echantillons.patient_id', '=', 'patients.patient_id')
        ->where('patients.patient_id', '=', $idpat)
        ->with(['resultexam.examenech.echpatient'])
        ->orderByDesc('resultats.Date_h_resultat')
        ->get();

        if($lesresults->isEmpty())
        {
             return redirect()->route('page_rechresult_patient')->with('danger', 'this patient does not have results');

        }else
        {

            // Utilisez le nom du patient du premier résultat dans le nom du fichier PDF
            $nomPatient = $lesresults->first()->nom_patient ?? 'UnknownPatient';
            

            $pdf = PDF::loadView('result.pdf', compact('lesresults'))->setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            ]);

        // Utilisez le nom du patient dans le nom du fichier PDF
            $nomFichier = $nomPatient . '_results.pdf';

            return $pdf->stream($nomFichier);
        }

    }

    public function rechresultpatients()
    {
        return view('result.rechpatient');
    }
}
