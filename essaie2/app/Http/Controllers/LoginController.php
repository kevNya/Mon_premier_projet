<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\EmailService;
class LoginController extends Controller
{
    //
    protected $request;
    function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function logout(){
    Auth::logout();
    return redirect()->route('page_ac');

    }

    public function existEmail(){ /*ici on va vérifier que deux utilisateurs n'ai pas le même mail*/
        $email = $this->request->input('email');//l'email qu'on va entrer dans la page register

        $user = User::where('email',$email) //'email' est le nom du champ dans la tables users de notre base de données
                        ->first();//ici on prend juste le premier on a pas besoin de tout

        $response = "";
        ($user) ? $response = "exist" : $response = "not_exist";/*on aurait pu faire if($user){$response="exist";} else{$response="not_exist";} c'est la même chose*/

        return response()->json([

            'response' =>$response
        ]);
    }

    public function ActivationCodefunc($token){
        $instantuser = User::where('activation_token', $token)->first(); //on met le token de l'utilisateur dans cette variable
        if(!$instantuser){//si le token est changer on va retourner vers la page login
            return redirect()->route('login');
        }
        if($this->request->isMethod('post')){//si la request est en mode post

            $code =$instantuser->activation_code; //on prend le code présent dans la base de données
            $act_cod_copicol = $this->request->input('activcod');//ici c'est le code que l'utilisateur à copier coller

            if($act_cod_copicol!=$code){
                return back()->with('danger', 'this code is invalid, please try another code');
            }else{
                DB::table('users')
                    ->where('id', $instantuser->id)
                    ->update([
                        'is_verified' => 1,
                        'activation_code'=>'',
                        'activation_token'=>'',
                        'email_verified_at'=> new \DateTimeImmutable,
                        'updated_at'=> new \DateTimeImmutable,

                    ]);
                     return redirect()->route('login')
                        ->with('success', 'Congrat!!  you can acced to your account now ');
            }

        }
        return view('auth.activationcode',['token'=> $token]);
    }

    public function resend_code($token){
        $instantuser = User::where('activation_token', $token)->first(); //on met le token de l'utilisateur dans cette variable
        $name= $instantuser->name;
        $email =  $instantuser->email;//récupération du mail
        $actitok=  $instantuser->activation_token;
        $acticod=  $instantuser->activation_code;

        $emailsend= new EmailService;
        $subject= "Active your Account";

        $message= view('mail.confirmmail')
                ->with([
                        'name'=> $name,
                        'activation1_code'=>$acticod,
                        'activation_token'=>$actitok,
                ]);//on veut que notre message soit une petite page html avec un peu de css et on va recupérer les valeurs dans le wich


        $emailsend->sendEmail($subject, $email, $name, true, $message);

        return redirect()->route('page_activation',['token'=>$token])->with('success', 'the new activation code is ready, please return in your mail-box');

    }


    public function userchecker(){//vérifier si l'utilisateur a déjà activer son compte ou pas
        $activ_tok_userchek =Auth::user()->activation_token;
        $is_veref_userchek =Auth::user()->is_verified;
        $membre=Auth::user()->membre;
        $name_userchek= Auth::user()->name;

        if($is_veref_userchek != 1){
            Auth::logout();
            return redirect()->route('page_activation',['token'=>$activ_tok_userchek])
                            ->with('warning', 'Hi '.$name_userchek. ' We send you an email, please take your code and activate your account');
        }
        else {
            if($membre=='1')
            return redirect()->route('page_dashboard');
            else{
                return redirect()->route('page_modifierrdv');
            }
        }
    }
     /*public function register(){
        return view('auth.register');
    }*/
}
