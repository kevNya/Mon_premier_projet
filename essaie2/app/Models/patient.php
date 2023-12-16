<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'patients';
    protected $primaryKey = 'patient_id';
    protected $fillable = [
        'patient_id',
        'nom',
        'prenom',
        'age',
        'sexe',
        'telephone',
        'adresse',
        'emailpat',
    ];

    //ci j'ai ma méthode qui défini les relations entre mes tables
    public function patientech()//je définis que mon patient peut avoir plusieurs échantillons
    {
        return $this->hasMany(Echantillon::class);
    }
}
