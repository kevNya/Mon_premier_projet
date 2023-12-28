<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'resultats';
    protected $primaryKey ='resultat_id';
    protected $fillable = [
        'resultat_id',
        'id_examen',
        'Date_h_resultat',
        'description',
    ];

    public function resultexam()
    {
        return $this->belongsTo(Examen::class,'id_examen');
    }
}
