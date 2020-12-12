@extends('layouts.base')



<!--

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>

      </ul>
    </div>
  </nav>

-->




<!--Validaciones de eliminacion-->
@if (session('schoolDeleted'))
    <div class="alert alert-success">
        {{ session('schoolDeleted') }}
    </div>
@endif

<!--Validaciones de actualización-->
@if (session('schoolUpdated'))
    <div class="alert alert-success">
        {{ session('schoolUpdated') }}
    </div>
@endif

<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-10">

            <h2 class="clo-md-10 mb-4">Listado de colegios</h2>

            <a class="btn btn-success mb-4" href="{{ '/schools/form' }}">Agregar Colegio</a>

            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Logo</th>
                        <th>Correo electrónico</th>
                        <th>Teléfono</th>
                        <th>Web</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schools as $school)
                        <tr>
                            <td>{{ $school->nombre_id }}</td>
                            <td>{{ $school->direccion }}</td>
                            <td><img src="{{ asset($school->logotipo) }}"/></td>
                            <td>{{ $school->email }}</td>
                            <td>{{ $school->telefono }}</td>
                            <td>{{ $school->web }}</td>
                            <td>

                                <a href="/students/{{ $school->id }}" class="btn btn-primary mb-2"><i class="fas fa-list-alt"></i></a>

                                <a href="{{route('editSchool', $school->id )}}" class="btn btn-primary  mb-2">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="/schools/{{ $school->id }}" method="post">
                                    @csrf @method('delete')
                                    <button type="submit" onclick="return confirm('¿Estas seguro?');"
                                        class="btn btn-danger mb-2">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $schools->links() }}
            </div>
        </div>
    </div>
</div>

