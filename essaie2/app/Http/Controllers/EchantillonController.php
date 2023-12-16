<?php

namespace App\Http\Controllers;

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
}
