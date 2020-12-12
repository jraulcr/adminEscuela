@extends('layouts.base')

<h1>Lista de estudiantes</h1>

@foreach ($students as $student)
    <ul>
    <li>Nombre: {{$student->nombre_id}}</li>
    <li>Nombre: {{$student->apellidos}}</li>
    <li>Nombre: {{$student->fecha_nac}}</li>
    <li>Nombre: {{$student->ciudad}}</li>
    <li>Nombre: {{$student->escuela_id}}</li>
    </ul>

@endforeach

