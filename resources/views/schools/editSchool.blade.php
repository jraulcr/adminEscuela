@extends('layouts.base')

<div class="container mt-5">

    <!--Mensaje-->
    @if (session('schoolUpdated'))
        <div class="alert alert-success">
            {{ session('schoolUpdated') }}
        </div>

    @endif

    <div class="row justify-content-center">
        <div class="card">

            <form action="{{ route('edit', $school->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('patch')
                <div class="card-header text-center">MODIFICAR COLEGIO</div>
                <div class="card-body">
                    <div class="row form-group">
                        <label for="" class="col-9">Nombre</label>
                        <input type="text" name="nombre_id" value="{{ $school->nombre_id }}" class="form-control col-md-9">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-9">Dirección</label>
                        <input type="text" name="direccion" value="{{ $school->direccion }}"
                            class="form-control col-md-9">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-9">Logotipo</label>
                        <input type="text" name="logotipo" value="{{ $school->logotipo }}"
                            class="form-control col-md-9">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-9">Correo electrónico</label>
                        <input type="email" name="email" value="{{ $school->email }}" class="form-control col-md-9">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-9">Teléfono</label>
                        <input type="tel" name="telefono" value="{{ $school->telefono }}" class="form-control col-md-9">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-9">Página web</label>
                        <input type="text" name="web" value="{{ $school->web }}" class="form-control col-md-9">
                    </div>

                    <div class="row form-group">
                        <button type="submit" class="btn btn-success col-md-4 offset-6">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
