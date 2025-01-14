<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\patient;
use App\Models\Materiel;


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

        $lespatients = patient::orderBy('patient_id', 'desc')->get();
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

    /*public function deletepatient()
    {

        $deleteid = $this->request->input('code');
        $deletenom=$this->request->input('Nom');
          $supprimepat= patient::where('patient_id', $deleteid)
                                    ->where('nom', $deletenom)
                                    ->first();
        if (!$supprimepat) {
        // Gérer le cas où le patient n'est pas trouvé
        return redirect()->route('page_createpatient')->with('danger', 'This patient have exams and samples in our structure.
        //Do really want to delete him?'.$errorMessage.'');
    }
            $iddelete = clone $supprimepat;
        try
        {
            $supprimepat->delete();

            return redirect()->route('page_createpatient')->with('danger', 'The patient with code '.$iddelete->patient_id.' and name '
                                                                .$iddelete->nom.' '.$iddelete->prenom.' was successfully deleted');
        }catch(\Illuminate\Database\QueryException $e){
            $errorMessage = $e->getMessage();
            return view('page_createpatient', ['errorMessage' => $errorMessage]);
            //return redirect()->route('page_createpatient')->with('danger', 'This patient have exams and samples in our structure.
                                                             //Do really want to delete him?'.$errorMessage.'');

        }



    }*/
    public function delete()
    {
        return view('patient.deletepatient');
    }

    public function deletepatient()
    {
        $deleteid = $this->request->input('code');
        $deletenom = $this->request->input('Nom');

        $supprimepat = patient::where('patient_id', $deleteid)
            ->where('nom', $deletenom)
            ->first();

        if (!$supprimepat) {
            // Gérer le cas où le patient n'est pas trouvé
            return redirect()->route('page_supprimepatient')->with('danger', 'Patient not found.');
        }
        $deletedPatientInfo = clone  $supprimepat ;
        try {
            $supprimepat->delete();
            return redirect()->route('page_supprimepatient')->with('success', 'The patient with code ' . $deletedPatientInfo['patient_id'] . ' and name ' . $deletedPatientInfo['nom'] . ' ' . $deletedPatientInfo['prenom'] . ' was successfully deleted');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];

            // Gérer le cas d'une contrainte de clé étrangère
            if ($errorCode == 1451) {
                $errorMessage = 'Cannot delete the patient. It is referenced by other records.';
                return redirect()->route('page_supprimepatient')->with('danger', $errorMessage);
            }

            // Autres erreurs de base de données
            $errorMessage = $e->getMessage();
            return redirect()->route('page_supprimepatient')->with('danger', $errorMessage);
        }
    }
    public function rechByCode(Request $request)
    {
        $codepat= $request->input('coder');
        $dataPat= patient::where('patient_id',$codepat)->first();

        if ($dataPat) {
            return view('patient.updateconfirm', compact('dataPat'));
        } else {
            // Gestion du cas où le patient n'est pas trouvé
            return redirect()->back()->with('danger', 'Patient not found.');
        }
    }

    public function returnviewupdatepat()
    {
        return view('patient.update1patient');
    }

    public function updatepat(Request $request)
    {
        //je récupère l'id que l'utilisateur va entrer
        $cod=$this->request->input('co');// je récupère lecode


        try{
            $updatepatient = patient::where('patient_id',$cod)->findOrFail($cod);
            $validatedData = $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'age' => 'required|numeric',
                'sexe' => 'required|string|size:1',
                'telephone' => 'required|numeric',
                'adresse' => 'required|string|max:50',
                'emailpat' => 'required|email|max:100',

            ]);

            $updatepatient->update($validatedData);
            return redirect()->route('page_viewupdatpatient')->with('success', 'The patient : '.$updatepatient->prenom.' '.$updatepatient->nom.'   has been modified!' );

        }
        catch (ModelNotFoundException $e){

            return redirect()->route('page_viewupdatpatient')->with('danger', 'this code and this name do not match. ');

        }

    }





    public function voime(){
        return view('home.about');
    }
    public function rechByClick($id)
    {
        // $codepat= $request->input($fieldName);
        $dataMat= Materiel::where('id',$id)->first();

        if ($dataMat) {
            return view('materiel.detailsMateriel', compact('dataMat'));
        } else {
            // Gestion du cas où le patient n'est pas trouvé
            return redirect()->back()->with('danger', 'not found.');
        }
    }
    public function UpdateByClick($id)
    {
        // $codepat= $request->input($fieldName);
        $dataMat= Materiel::where('id',$id)->first();

        if ($dataMat) {
            return view('materiel.updateMateriel', compact('dataMat'));
        } else {
            // Gestion du cas où le patient n'est pas trouvé
            return redirect()->back()->with('danger', 'not found.');
        }
    }
    public function allmaterials()
    {
        // $codepat= $request->input($fieldName);
        // s
        $dataMat = Materiel::orderBy('id', 'desc')->get();
        if ($dataMat) {
            return view('materiel.materiel', compact('dataMat'));
        } else {
            // Gestion du cas où le patient n'est pas trouvé
            return redirect()->back()->with('danger', 'not found.');
        }
    }
    public function updateMateriel(Request $request)
    {
        //je récupère l'id que l'utilisateur va entrer
        $cod=$this->request->input('nom');// je récupère lecode
        $qtite_stock=$this->request->input('qtite_stock');


        try{
            $updatemat = Materiel::where('nom',$cod)->first();

            $validatedData = $request->validate([
                'qtite_stock' => 'required|numeric',
                'stock_critique' => 'required|numeric',
                'qtite_Acommander' => 'required|numeric',
                'date_achat' => 'required|date',
                'date_peremption' => 'required|date',
                'quantite_ajoute'=>'required|numeric',
                'quantite_retire'=>'required|numeric',
            ]);

            $updatemat->update($validatedData);

            return redirect()->route('pagedetailsMateriel',['id'=>$updatemat->id])->with('success', 'The materials has been modified!' );


        }
        catch (ModelNotFoundException $e){

            return redirect()->route('pagedetailsMateriel',['id'=>$updatemat->id])->with('danger', 'Please check your datas. ');

        }

    }
}
