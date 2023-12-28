<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Echantillon extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'echantillons';
    protected $primaryKey = 'echantillon_id';
    protected $fillable = [
        'echantillon_id',
        'patient_id',
        'examen',
        'Date_h_reception',
        'commentaire',

    ];

    //methode qui dit que mon échantillon appartient à un patient
    public function echpatient()
    {
        return $this->belongsTo(patient::class, 'patient_id');
    }

    public function echexam() // Je défini ici que mon échantillon peut avoir plusieurs examens
    {
        return $this->hasMany(Examen::class,'echantillon_id');
    }

}
