<?php

namespace App\Http\Controllers;
use App\Models\School;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class StudentsController extends Controller
{



    public function list($nombre)
{

    $school = School::findOrFail($nombre);
    return view('students.list', compact('school'));

 /*   $student = Student::orderBy('nombre', 'asc')->get();
    return view('students.list')->with('student', $student);
*/

 /*   $student = Student::orderBy('nombre', 'asc')->get();
    return view('students.list')->with('student', $student);
*/



    //$students = DB::table('students')
  //  ->join('school', 'school.nombre', '=', 'students.escuela');


  // $students = Student::find($id);
  // return view('students.list')->with('students', $students);
  // return view('students')->with(['students' => $students]);
}


   // public function list()
  //  {
    /*  $students=Student::get();
        return view('students', compact('students'));*/

       // $school->students
  //  }

 /*   public function listStudent()
    {
        $schools = School::all();

        return view('schools.list', compact('schools'));
    }*/

    public function destroy(Student $student)
    {
        //
    }
}
