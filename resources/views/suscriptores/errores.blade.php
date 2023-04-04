@extends('layouts.app')

@section('title', 'Suscriptores')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@section('content')

<div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                <div class="col-sm-12 col-md-6"> 
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                    </div>
                </div>
            </div>
        <div >
            <div>
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed" aria-describedby="example1_info">
        <thead>
        <tr>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"> ID</th>
        <th>Cédula</th>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Matricula</th>
        <th>Nacimiento</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th>Dirección Residencia</th>
        <th>Vereda</th>
        <th>Sector</th>
        <th>Municipio</th>
        <th>País</th>
        <th>Coordenadas</th>
        <th>Estado</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="display: none;">Acción</th>
    </tr>
                  </thead>
                  <tbody>
@foreach ($suscriptores as $suscriptor)
            <tr class="odd">
                <td>{{ $suscriptor->id }}</td>
                <td>{{ $suscriptor->cedula }}</td>
                <td>{{ $suscriptor->apellidos }}</td>
                <td>{{ $suscriptor->nombres }}</td>
                <td>{{ $suscriptor->matricula }}</td>
                <td>{{ $suscriptor->fecha_nacimiento }}</td>
                <td>{{ $suscriptor->email }}</td>
                <td>{{ $suscriptor->telefono }}</td>
                <td>{{ $suscriptor->direccion_residencia }}</td>
                <td>{{ $suscriptor->vereda }}</td>
                <td>{{ $suscriptor->sector }}</td>
                <td>{{ $suscriptor->municipio }}</td>
                <td>{{ $suscriptor->pais }}</td>
                <td>{{ $suscriptor->coordenadas }}</td>
                <td>{{ $suscriptor->estado }}</td>
                <td>
                   
                    <form action="{{ route('suscriptores.destroy', $suscriptor->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('suscriptores.edit', $suscriptor->id) }}">Editar</a></td><td>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>

        @endforeach                    
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite"> </div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"></div></div></div></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->



@endsection

