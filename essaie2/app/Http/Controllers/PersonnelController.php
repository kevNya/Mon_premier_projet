<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Personnel;
class PersonnelController extends Controller
{
    //
    protected $request;
    function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function lestaffcomplet() //récupération des rendez-vous par ordre de date croissante
    {

        $lestaff =User::where('membre','1')->get();
        return view('personnel.listepersonnel', compact('lestaff'));
    }

    public function detailsmembrestaff(string $nomperso)
    {
        $lestaff =User::where('membre','1')->get();
        $dataper= Personnel::where('name',$nomperso)->first();
        if ($dataper) {
            return view('personnel.detailspersonnel', compact('lestaff'),compact('dataper'));
        } else {
            // Gestion du cas où le patient n'est pas trouvé
            return redirect()->back()->with('danger', 'not found.');
        }
    }
}
