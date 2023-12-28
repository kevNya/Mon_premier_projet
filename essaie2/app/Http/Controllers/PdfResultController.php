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

        // Utilisez le nom du patient du premier résultat dans le nom du fichier PDF
        $nomPatient = $lesresults->first()->nom_patient ?? 'UnknownPatient';
        // Utilisez 'UnknownPatient' si le nom du patient n'est pas trouvé

        $pdf = PDF::loadView('result.pdf', compact('lesresults'))->setOptions([
        'isHtml5ParserEnabled' => true,
        'isPhpEnabled' => true,
    ]);

    // Utilisez le nom du patient dans le nom du fichier PDF
        $nomFichier = $nomPatient . '_results.pdf';

        return $pdf->stream($nomFichier);
    }

    public function rechresultpatients()
    {
        return view('result.rechpatient');
    }
}
