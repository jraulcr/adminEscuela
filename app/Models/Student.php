<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey ='nombre_id';
    public $incrementing = false;

    protected $fillable = [
        'nombre_id',
        'apellidos',
        'fecha_nac',
        'ciudad',
        'escuela_id'
    ];

    public function school(){
        return $this->belongsTo(School::class, 'escuela_id', 'nombre_id');
    }

   /* public function schools(){
        return $this->hasMany(School::class, 'nombre', 'escuela');
    }*/
}
