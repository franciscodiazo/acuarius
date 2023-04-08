    @extends('layouts.app')

    @section('title', 'Inicio')
    @section('menu')
        @parent
    @endsection
    @section('content')

    <div class="row">

        <div class="col-md-3">

            <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">
                </h3>
                </div>
                <div class="box-body">
            </div>

            </div>

    </div>

                <a class="btn btn-app bg-secondary" href="{{ route('suscriptores.index') }}">
                <span class="badge bg-success"></span>
                <i class="fas fa-barcode"></i> Usuarios
                </a>
                <a class="btn btn-app bg-success" href="{{ route('matriculas.index') }}">
                <span class="badge bg-purple"></span>
                <i class="fas fa-users"></i> Matricula
                </a>
                <a class="btn btn-app bg-danger" href="{{ route('lecturas.index') }}">
                <span class="badge bg-teal"></span>
                <i class="fas fa-inbox"></i> Lecturas
                </a>
                <a class="btn btn-app bg-warning">
                <span class="badge bg-info">12</span>
                <i class="fas fa-envelope"></i> Inbox
                </a>
                <a class="btn btn-app bg-info">
                <span class="badge bg-danger">531</span>
                <i class="fas fa-heart"></i> Likes
                </a>
    <div class="col-md-9">
        <!-- Contenido de la sección seleccionada del menú -->
    </div>
</div>
    @endsection