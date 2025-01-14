<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'materiel';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nom',
        'qtite_stock',
        'date_achat',
        'date_peremption',
        'stock_critique',
        'perime',
        'qtite_Acommander',
        'niveau_du_stock',
        'quantite_retire',
        'quantite_ajoute',
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
