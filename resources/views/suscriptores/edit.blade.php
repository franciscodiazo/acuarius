<h1>Editar Suscriptor</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Suscriptor') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('suscriptores.update', $suscriptor->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="cedula">{{ __('Cédula') }}</label>
                            <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ $suscriptor->cedula }}" required autocomplete="cedula" autofocus>

                            @error('cedula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="apellidos">{{ __('Apellidos') }}</label>
                            <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ $suscriptor->apellidos }}" required autocomplete="apellidos">

                            @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nombres">{{ __('Nombres') }}</label>
                            <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ $suscriptor->nombres }}" required autocomplete="nombres">

                            @error('nombres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="matricula">{{ __('matricula') }}</label>
                            <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ $suscriptor->matricula }}" required autocomplete="matricula">

                            @error('matricula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_nacimiento">{{ __('Fecha de Nacimiento') }}</label>
                            <input id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="{{ $suscriptor->fecha_nacimiento }}" required autocomplete="fecha_nacimiento">

                            @error('fecha_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $suscriptor->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telefono">{{ __('Teléfono') }}</label>
                            <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $suscriptor->telefono }}" required autocomplete="telefono">

                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="direccion_residencia">{{ __('Direccón Residencia') }}</label>
                            <input id="direccion_residencia" type="text" class="form-control @error('direccion_residencia') is-invalid @enderror" name="direccion_residencia" value="{{ $suscriptor->direccion_residencia }}" required autocomplete="direccion_residencia">

                            @error('direccion_residencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="vereda">{{ __('Vereda') }}</label>
                            <input id="vereda" type="text" class="form-control @error('vereda') is-invalid @enderror" name="vereda" value="{{ $suscriptor->vereda }}" required autocomplete="vereda">

                            @error('vereda')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sector">{{ __('sector') }}</label>
                            <input id="sector" type="text" class="form-control @error('sector') is-invalid @enderror" name="sector" value="{{ $suscriptor->sector }}" required autocomplete="sector">

                            @error('sector')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="municipio">{{ __('municipio') }}</label>
                            <input id="municipio" type="text" class="form-control @error('municipio') is-invalid @enderror" name="municipio" value="{{ $suscriptor->municipio }}" required autocomplete="municipio">

                            @error('municipio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pais">{{ __('pais') }}</label>
                            <input id="pais" type="text" class="form-control @error('pais') is-invalid @enderror" name="pais" value="{{ $suscriptor->pais }}" required autocomplete="pais">

                            @error('pais')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="coordenadas">{{ __('coordenadas') }}</label>
                            <input id="coordenadas" type="text" class="form-control @error('coordenadas') is-invalid @enderror" name="coordenadas" value="{{ $suscriptor->coordenadas }}" required autocomplete="coordenadas">

                            @error('coordenadas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="estado">{{ __('estado') }}</label>
                             <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" value={{old('estado')}} required autocomplete="estado">
					            <option value="Activo">Activo</option>
					            <option value="Inactivo">Inactivo</option>
					        </select>
                            @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>