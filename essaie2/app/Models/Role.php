<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table = 'role';
    protected $primaryKey ='id';
    protected $fillable = [
        'id',
        'name',
        'id_user',

    ];

    public function roleuser()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
