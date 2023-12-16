<?php

namespace App\Http\Controllers;

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

}
