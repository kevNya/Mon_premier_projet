<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
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
        $lesresults= Result::orderBy('Date_h_resultat','asc')
                                ->with('resultexam.examenech.echpatient')
                                ->get();
        return view('result.resultlist',compact('lesresults'));
    }
    public function rechercherresult()
    {
        $code = $this->request->input('recherc');
        $lesresultsrech= Result::where('resultat_id',$code)->get();
        return view('result.resultrechearch',compact('lesresultsrech'));
    }
}
