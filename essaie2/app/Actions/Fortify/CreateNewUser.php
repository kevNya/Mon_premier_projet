<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Services\EmailService;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
    {
       /* Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();*/

        $email = $input['email']; //juste pour ne pas avoir à l'écrire plusieurs fois

        $activ_token = md5(uniqid()).$email.sha1($email); // code pour hacher (on va générer le token pour activer le compte utilisateur)
        $activ_code= "";
        $length_code =5;

        for($i=0; $i<$length_code; $i++){ //génération d'un code aléatoire pour le token
            $activ_code.=mt_rand(0,9);
        }

        $name= $input['firstname'] . ' '.$input['lastname'];

        $emailsend= new EmailService;
        $subject= "Active your Account";

        $message= view('mail.confirmmail')
                ->with([
                        'name'=> $name,
                        'activation1_code'=>$activ_code,
                        'activation_token'=>$activ_token,
                ]);//on veut que notre message soit une petite page html avec un peu de css et on va recupérer les valeurs dans le wich


        //$emailsend->sendEmail($subject, $email, $name, true, $message);

        return User::create([
            'name' =>$name, // ce <<'name'>> ci correspond au champ name dans notre table users de la bd, pareil pour tous ceux qui sont avant la flèche dans cette fonction
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'activation_code'=> $activ_code,
            'activation_token'=>$activ_token,
        ]);

    }
}
