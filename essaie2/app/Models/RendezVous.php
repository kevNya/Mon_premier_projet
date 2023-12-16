<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $table = 'rendez_vouses';
    protected $fillable = [
        'id',
        'date',
        'heure',
        'nom_patient',
        'prenom',

        // Ajoutez d'autres colonnes si nécessaire
    ];
}
