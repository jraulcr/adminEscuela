<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SchoolController extends Controller
{


    //Formulario de Colegios
    public function schoolForm()
    {
        return view('schools.schoolForm');
    }

    //Listado de Colegios
    public function list()
    {
        /*  $schoolList ['schools'] = School::paginate(3);
        return view('schools.list', $schoolList);*/

        $schools = School::simplePaginate(3);
        return view('schools.list', compact('schools'));
    }

    //Guardar colegio
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_id' => 'required|string|min:3|max:50',
            'direccion' => 'required|string|min:3|max:50',
            'logotipo' => 'required|image|max:2048',
            'email' => 'required|string|email|max:50|',
            'telefono'=>'required|integer|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'web' => 'required|string|max:50|regex:/^(ht|f)tp(s?)\:\/\/[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)( [a-zA-Z0-9\-\.\?\,\'\/\\\+&%\$#_]*)?$'
        ]);

        $nameExist = School::where('id',  $request->input('id'))->count();
        // $emailExist = School::where('email',  $request->input('email'))->count();

        if (!$nameExist > 0) {

            if ($logo = School::setLogo($request->file('logotipo'))) {
                $request->request->add(['logotipo' => $logo]);
            }

            $file = $request->file('logotipo');
            $nameFile = $file->getClientOriginalName();
            $schoolData = (new School)->fill($request->all());
            $schoolData->logotipo  = URL::asset('storage/images') . '/' . $nameFile;
            $schoolData->save();

            //  return response('ok',200);
            return back()->with('schoolSuccess', 'Registro de colegio guardado');
        } else {

            return back()->with('registroExist', 'Registro ya existe');
        }
    }


    //Formulario para editar colegios
    public function editSchool($id)
    {
        $school = School::findOrFail($id);
        return view('schools.editSchool', compact('school'));
    }

    //Edición de colegio
    public function edit(Request $request, $id)
    {
        $schoolData = $request->except((['_token', '_method']));
        School::where('id', '=', $id)->update($schoolData);
        return back()->with('schoolUpdated', 'Registro actualizado');
    }

    //Eliminar Colegio (Se deberia eliminar los datos del alumno correspondiente al colegio)
    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school->delete();
        return back()->with('schoolDeleted', 'Registro ' . $school->id . ' eliminado');
    }
}
