@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Crédito</h1>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="matricula">Matrícula</label>
                    <input type="text" class="form-control" name="matricula" value="{{ $credito->matricula }}" disabled>
                </div>
                <div class="form-group">
                    <label for="matricula">acuerdo</label>
                    <input type="text" class="form-control" name="acuerdo" value="{{ $credito->acuerdo }}" disabled>
                </div>
                <div class="form-group">
                    <label for="matricula">detalle</label>
                    <input type="text" class="form-control" name="detalle" value="{{ $credito->detalle }}" disabled>
                </div>
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de inicio</label>
                    <input type="text" class="form-control" name="fecha_inicio" value="{{ isset($credito->fecha_inicio) ? \Carbon\Carbon::parse($credito->fecha_inicio)->format('d/m/Y') : '' }}" disabled>


                </div>
                <div class="form-group">
                    <label for="fecha_final">Fecha final</label>
                    <input type="text" class="form-control" name="fecha_inicio" value="{{ isset($credito->fecha_final) ? \Carbon\Carbon::parse($credito->fecha_final)->format('d/m/Y') : '' }}" disabled>

                </div>
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="text" class="form-control" name="monto" value="{{ $credito->monto }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tasa_interes">Tasa de interés</label>
                    <input type="text" class="form-control" name="tasa_interes" value="{{ $credito->tasa_interes }}" disabled>
                </div>
                <div class="form-group">
                    <label for="plazo_meses">Plazo en meses</label>
                    <input type="text" class="form-control" name="plazo_meses" value="{{ $credito->plazo_meses }}" disabled>
                </div>
                <div class="form-group">
                    <label for="fecha_proximo_pago">Fecha próximo pago</label>
                    <input type="text" class="form-control" name="fecha_proximo_pago" value="{{ isset($credito->fecha_proximo_pago) ? \Carbon\Carbon::parse($credito->fecha_proximo_pago)->format('d/m/Y') : '' }}" disabled>
                </div>
                <div class="form-group">
                    <label for="saldo">Saldo</label>
                    <input type="text" class="form-control" name="saldo" value="{{ $credito->saldo }}" disabled>
                </div>
            </div>
        </div>
        <a href="{{ route('creditos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection