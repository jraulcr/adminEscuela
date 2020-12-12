@extends('layouts.base')

<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-7 mt-5">
    <!--Mensaje-->
    @if (session('schoolSuccess'))
        <div class="alert alert-success">
            {{ session('schoolSuccess') }}
        </div>

    @endif


    <!--Validaciones de registro existente-->
        @if (session('registroExist'))
        <div class="alert alert-danger">
            {{ session('registroExist') }}
        </div>
        @endif



    <!--Validaciones de registro-->


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif




        <div class="card">

            <form action="{{ url('/schools/save') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <div class="card-header text-center">AGREGAR COLEGIO</div>
                <div class="card-body">
                    <div class="row form-group">
                        <label for="" class="col-9">Nombre</label>
                        <input type="text" name="nombre_id" class="form-control col-md-10">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-9">Dirección</label>
                        <input type="text" name="direccion" class="form-control col-md-10">
                    </div>
                    <div class="row form-group">
                        <label for="logotipo" class="col-9">Logotipo</label>
                        <input type="file" name="logotipo" class="form-control col-md-10" accept="image/*">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-9">Correo electrónico</label>
                        <input type="email" name="email" class="form-control col-md-10">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-9">Teléfono</label>
                        <input type="tel" name="telefono" class="form-control col-md-10">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-9">Página web</label>
                        <input type="text" name="web" class="form-control col-md-10">
                    </div>

                    <div class="row form-group">
                        <button type="submit" class="btn btn-success col-md-4 offset-6" value="guardar">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
