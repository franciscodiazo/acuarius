@extends('layouts.app')

@section('title', 'Inicio')

@section('menu')
    @parent
    <p>Este condenido es añadido al menú principal.</p>
@endsection

@section('content')
    <h1>Bienvenido a mi aplicación</h1>
    <p>Esta es una página de ejemplo utilizando Bootstrap.</p>
@endsection