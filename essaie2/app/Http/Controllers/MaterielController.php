<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Materiel;

class MaterielController extends Controller
{
    //
    protected $request;

    public function __construct(Request $request)
    {
        $this->request=$request;
    }
    public function rechByClick($id)
    {
        // $codepat= $request->input($fieldName);
        $dataMat= Materiel::where('id',$id)->first();

        if ($dataMat) {
            return view('patient.updateconfirm', compact('dataMat'));
        } else {
            // Gestion du cas où le patient n'est pas trouvé
            return redirect()->back()->with('danger', 'Patient not found.');
        }
    }
    public function voime(){
        return view('patient.updateconfirm');
    }

}
