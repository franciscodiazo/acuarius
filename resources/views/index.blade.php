@extends('layouts.app')

@section('title', 'Inicio')

@section('menu')
    @parent
    <p>Este condenido es añadido al menú principal.</p>
@endsection

@section('content')
    <h1>Bienvenido a mi aplicación</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Menú</h3>
                </div>
                <div class="box-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard.index') }}">Inicio</a></li>
                        <li class="{{ Request::is('dashboard/usuarios') ? 'active' : '' }}"><a href="{{ route('dashboard.usuarios.index') }}">Usuarios</a></li>
                    <li class="{{ Request::is('dashboard/clientes') ? 'active' : '' }}"><a href="{{ route('dashboard.clientes.index') }}">Clientes</a></li>
                    <li class="{{ Request::is('dashboard/ventas') ? 'active' : '' }}"><a href="{{ route('dashboard.ventas.index') }}">Ventas</a></li>
                    <!-- Agrega más enlaces aquí -->
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <!-- Contenido de la sección seleccionada del menú -->
    </div>
</div>



@endsection