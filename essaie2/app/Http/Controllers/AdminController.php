<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    //
    protected $request;
    function __construct(Request $request)
    {
       $this->request= $request;
    }
    public function allusers()
    {
        $lesusers= User::orderBy('created_at','desc')->get();
        return view('admin.leschoix',compact('lesusers'));
    }
    public function membres()
    {
        $lesusers= User::where('membre','1')->get();
        return view('admin.leschoix',compact('lesusers'));
    }

    public function trienom()
    {
        $rechusers= $this->request->input('rechusers');
        try
        {
            $lesusers= User::where('name', 'LIKE', "%$rechusers%")->get();
            return view('admin.leschoix',compact('lesusers'));
        }catch(Exception $e)
        {
            return view('admin.leschoix',compact('lesusers'))->with('danger','this users does not exist');
        }

    }

    public function leschoix()
    {
        return view('admin.leschoix');
    }

    public function addmembre()
    {
        return view('admin.addmember');
    }

    public function defmembre(Request $request)
    {
    $codusers = $request->input('id_user');
    $codmembre = $request->input('membre');

    try {
        $editmember = User::findOrFail($codusers);

        $validateData = $request->validate([
            'membre' => 'required|numeric',
        ]);

        $data = $request->only('membre');

        if ($codmembre == '1') {
            $editmember->update($data);
            return redirect()->route('page_addmembre')->with('success', 'The user ' . $editmember->name . ' is now a member.');
        } elseif ($codmembre == '0') {
            $editmember->update($data);
            return redirect()->route('page_addmembre')->with('danger', 'User ' . $editmember->name . ' is no longer a member.');
        } else {
            return redirect()->route('page_addmembre')->with('danger', 'Invalid user code.');
        }
    } catch (ModelNotFoundException $e) {
        return redirect()->route('page_addmembre')->with('danger', 'This user does not exist.');
    }
    }



    public function afficherole()
    {
        $lesroles = Role::orderBy('id','desc')->with('roleuser')->get();
        return view('admin.gererrole',compact('lesroles'));
    }


    public function indexresult()
    {//schématisation de la triple jointure grace à éloquent "resultexam.examenech.echpatient" représente les différentes relation entre les models(table) dans la BD
        $lesresults= Result::orderBy('Date_h_resultat','desc')
                                ->with('resultexam.examenech.echpatient')
                                ->get();
        return view('result.resultlist',compact('lesresults'));
    }

    public function defrole(Request $request)
    {

    try {

        $validateData = $request->validate([
            'id_user'=>'required|numeric',
            'name' => 'required|string',
        ]);

        $data = $request->only(['name','id_user']);
        $newrole= Role::create($data);
        return redirect()->route('page_gererrole')->with('success', 'success');
    } catch (\Illuminate\Database\QueryException $e) {

        return redirect()->route('page_gererrole')->with('danger', 'This user does not exist.');
    }
    }

}
