@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear copia de seguridad</h1>
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('backup.create') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Crear copia de seguridad</button>
        </form>
        <hr>
        <h1>Descargar copia de seguridad</h1>
        <form action="{{ route('backup.download') }}" method="GET">
            <button type="submit" class="btn btn-primary">Descargar copia de seguridad</button>
        </form>
    </div>
@endsection
