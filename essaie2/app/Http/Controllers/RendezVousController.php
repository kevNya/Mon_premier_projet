<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVous;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RendezVousController extends Controller
{

    protected $request;
    function __construct(Request $request)
    {
        $this->request = $request;
    }
    //

    public function indexall() //récupération des rendez-vous par ordre de date croissante
    {

        $rendezvous = RendezVous::orderBy('date', 'asc')->orderBy('heure', 'asc')->get();
        return view('rdv.listerdv', compact('rendezvous'));
    }


    public function index() //récupération des rendez-vous par jour
    {
        $datesys= new \DateTimeImmutable();
        $datesyst= $datesys->format('Y-m-d');// transformation du date time en date
        $rendezvous = RendezVous::where('date',$datesyst)->orderBy('date', 'asc')->orderBy('heure', 'asc')->get();
        return view('rdv.listerdv', compact('rendezvous'));
    }

    public function create()
    {
        return view('rdv.creationrdv');
    }



    public function edit($id)
    {
        $rendezvous = RendezVous::findOrFail($id);
        return view('rendezvous.edit', compact('rendezvous'));
    }


    public function update(Request $request)
    {
        $id=$this->request->input('id'); //je récupère l'id que l'utilisateur va entrer
        $nom=$this->request->input('nom');// je récupère le nom aussi
        try{
            $rendezvous = RendezVous::where('id',$id)
                                    ->where('nom_patient', $nom)
                                    ->findOrFail($id);

            $validatedData = $request->validate([
                    'date' => 'required|date',
                    'heure' => 'required',

                    ]);

            $rendezvous->update($validatedData);
            return redirect()->route('page_modifierrdv')->with('success', 'Your new appoitment will be the : '.$rendezvous->date.'  at  '.$rendezvous->heure.'.   Thank you!' );

        }
        catch (ModelNotFoundException $e){

            return redirect()->route('page_modifierrdv')->with('danger', 'this code and this name do not match. ');

        }

    }



    public function store(Request $request)
    {
        // Validez les données du formulaire
        $validatedData = $request->validate([
            'date' => 'required|date',
            'heure' => 'required|time',

            'nom_patient' => 'required|string',
            'prenom' => 'required|string',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        // Créez un nouveau rendez-vous dans la base de données
        RendezVous::create($validatedData);
        $nompatient=$this->request->input('nom_patient');
        $prenompatient= $this->request->input('prenom');
        $id=$this->recupid($nompatient, $prenompatient);
        return redirect()->route('rendezvous.create')->with('success', 'Congrat!! Your are on our planning. YOUR CODE IS '. $id .' Please keep it well if you want to change
        your schedule.')->with('warning', ' YOUR CODE IS '. $id .' ');
    }

    public function recupid($nompatient, $prenompatient)
    {
        $rendezvous = RendezVous::where('nom_patient', $nompatient)
                                ->where('prenom', $prenompatient)
                                ->first();

        return $rendezvous->id;
    }
    public function supprimerdv2()
    {
        $id=$this->request->input('id');
        $nom=$this->request->input('nom');
        try{
            $rendezvous = RendezVous::where('id',$id)
                                    ->where('nom_patient', $nom)
                                    ->findOrFail($id);

            $rendezvousData = clone $rendezvous;
            $rendezvous->delete();
            //return view('rendezvous.edit', compact('rendezvous'))
            return redirect()->route('page_suppressionrdv')->with('rendezvousData', 'Hi '.$rendezvousData->nom_patient.' your appointment of '.$rendezvousData->date.
                                                             ' at '.$rendezvousData->heure.' is canceled');
        }
        catch (ModelNotFoundException $e){

            return redirect()->route('page_suppressionrdv')->with('danger', 'This code and this name do not match, or this appointment was already delete.');

        }
    }
    public function supprimerdv()
    {
        return view('rdv.supprimerdv');
    }
    public function changerdv()
    {
        return view('rdv.modifierrdv');
    }


    public function indexx()
    {
        return response()->json(RendezVous::all());
    }

    // Récupérer les disponibilités pour une date donnée
    public function disponibilites(Request $request)
    {
        $date = $request->input('date');

    // Générer les horaires entre 08:00 et 17:30 (périodes de 30 minutes)
        $horaires = collect();
        for ($hour = 8; $hour <= 17; $hour++) {
            $horaires->push(sprintf('%02d:00:00', $hour)); // Exemple : 08:00
            $horaires->push(sprintf('%02d:30:00', $hour)); // Exemple : 08:30
        }

    // Récupérer les horaires déjà pris dans la base de données
        $horairesPris = RendezVous::where('date', $date)->pluck('heure');

    // Exclure les horaires pris
        $horairesDisponibles = $horaires->diff($horairesPris);

        return response()->json($horairesDisponibles->values());
    }

    // Créer un nouveau rendez-vous
    public function storee(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i:s',
            'nom_patient' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        $existe = RendezVous::where('date', $validated['date'])
            ->where('heure', $validated['heure'])
            ->exists();

        if ($existe) {
            return response()->json(['message' => 'Cet horaire est déjà pris'], 400);
        }

        $rendezVous = RendezVous::create($validated);
        return response()->json([
            'message' => 'Congratulations! You are on our schedule. YOUR CODE IS '. $rendezVous->id,
            'status' => 'success'
        ], 200);    }
}
