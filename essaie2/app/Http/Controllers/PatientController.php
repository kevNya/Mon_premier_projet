<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\patient;

class PatientController extends Controller
{
    //
    protected $request;
    function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function indexpatients() //récupération des rendez-vous par ordre de date croissante
    {

        $lespatients = patient::orderBy('patient_id', 'asc')->get();
        return view('patient.patientlist', compact('lespatients'));
    }
    public function rechercherpatient(){
        $codeentrant = $this->request->input('recherche');
        $patientrechercher= patient::where('nom',$codeentrant)->get();
        return view('patient.patientrechearch', compact('patientrechercher'));
    }
    public function menu(){
        return view('patient.menupatient');
    }

    public function recupeid($nompatient, $telephonepatient)
    {
        $paID = patient::where('nom', $nompatient)
                                ->where('telephone', $telephonepatient)
                                ->first();

        return $paID->patient_id;
    }

    public function fristviewpat(){
        return view('patient.gestionpatient');
    }

    public function nouveaupatient(Request $request)
    {
        // Validez les données du formulaire
        $validatedData = $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'age' => 'required|numeric',
        'sexe' => 'required|string|size:1',
        'telephone' => 'required|numeric',
        'adresse' => 'required|string|max:50',
        'emailpat' => 'required|email|max:100',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        // Créez un nouveau rendez-vous dans la base de données
        try{
            patient::create($validatedData);
            $nompatient=$this->request->input('nom');
            $telephonepatient= $this->request->input('telephone');
            $id=$this->recupeid($nompatient, $telephonepatient);
        return redirect()->route('page_createpatient')->with('success', 'The code of this new patient is '.$id.'');
        }
        catch(Exception $e){
            return redirect()->route('page_createpatient')->with('danger', 'Something does not match please retry again');
        }
    }

}
