<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentsController;
use App\Models\Student;
use App\Models\School;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//**COLEGIOS */

//Listado de colegios
Route::get('/schools/list', [SchoolController::class,'list']);
//Formulario de registro de colegios
Route::get('/schools/form', [SchoolController::class,'schoolForm']);
//Guardar colegios
Route::post('/schools/save', [SchoolController::class,'save'])->name('save');
//Eliminar colegios
Route::delete('/schools/{id}', [SchoolController::class,'destroy'])->name('delete');
//Formulario para editar colegios
Route::get('/schools/editSchool/{id}', [SchoolController::class,'editSchool'])->name('editSchool');
//Edicion colegios
Route::patch('/schools/edit/{id}', [SchoolController::class,'edit'])->name('edit');




//**ALUMNOS */
//Route::get('/students/{nombre_id}', [StudentsController::class,'list'])->name('schools');

Route::get('students/{id}', function ($id) {
    $students = School::find($id)->students;
   // $students = School::find('Academia Santa Tecla')->students;


   return view('students.list',compact('students'));
});

  /*  foreach ($students as $student) {

        echo $student->nombre_id . "<br/>";
        echo $student->escuela_id . "<br/>";
        # code...
    }
});*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
