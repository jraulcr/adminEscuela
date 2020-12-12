<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class School extends Model
{
    use HasFactory;
    protected $table = 'schools';
    protected $primaryKey ='id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nombre_id',
        'direccion',
        'logotipo',
        'email',
        'telefono',
        'web'
    ];

    public static function setLogo($logo, $actual = false)
    {
        if ($logo) {
            //Si ya lo tenemos en el disco
            if ($actual) {
                Storage::disk('public')->delete("images/$actual");
            }

            $imageName = $logo->getClientOriginalName();
            $imagen = Image::make($logo);
            $imagen->resize(200, 200, function ($constraint) {
                $constraint->upsize();
            });

            Storage::disk('public')->put("images/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }
//https://www.youtube.com/watch?v=R3HwLthnbCo

public function students(){
    return $this->hasMany(Student::class, 'escuela_id', 'nombre_id');
}


public function student(){
    return $this->hasOne(School::class, 'escuela_id', 'nombre_id');
}


}
