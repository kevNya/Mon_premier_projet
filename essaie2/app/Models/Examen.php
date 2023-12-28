<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'examens';
    protected $primaryKey = 'examen_id';
    protected $fillable = [
        'examen_id',
        'echantillon_id',
        'nom_examen',
        'Date_h_manipulation',
        'commentaire',
        'jour',


    ];

    //ici on montre que un examen ne peut appartenir qu'à un seul échantillon
    public function examenech()
    {
        return $this->belongsTo(Echantillon::class,'echantillon_id');
    }
    public function resultat() {
        return $this->hasOne(Result::class);
    }



}
