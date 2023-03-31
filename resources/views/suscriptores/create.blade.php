<h1>Crear nuevo Suscriptor</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<form action="{{ route('suscriptores.store') }}" method="POST">
    @csrf
    {{csrf_field()}}

    <div class="form-group">
        <label for="cedula">Cédula:</label>
        <input type="text" class="form-control" id="cedula" name="cedula" maxlength="20" required value={{old('cedula')}}>
    </div>

    <div class="form-group">
        <label for="apellidos">Apellidos:</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" maxlength="100" required value={{old('apellidos')}}>
    </div>

    <div class="form-group">
        <label for="nombres">Nombres:</label>
        <input type="text" class="form-control" id="nombres" name="nombres" maxlength="100" required value={{old('nombres')}}>
    </div>    
    <div class="form-group">
        <label for="matricula">matricula:</label>
        <input type="text" class="form-control" id="matricula" name="matricula" maxlength="100" required value={{old('matricula')}}>
    </div>

    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"  required value={{old('fecha_nacimiento')}}>
    </div>

    <div class="form-group">
        <label for="email">Correo:</label>
        <input type="email" class="form-control" id="email" name="email" maxlength="100" required>
    </div>

    <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="text" class="form-control" id="telefono" name="telefono" maxlength="20"  required value={{old('telefono')}}>
    </div>

    <div class="form-group">
        <label for="direccion_residencia">Dirección de Residencia:</label>
        <input type="text" class="form-control" id="direccion_residencia" name="direccion_residencia" maxlength="200" required value={{old('direccion_residencia')}}>
    </div>

    <div class="form-group">
        <label for="vereda">Vereda:</label>
        <input type="text" class="form-control" id="vereda" name="vereda" maxlength="100" required value={{old('vereda')}}>
    </div>

    <div class="form-group">
        <label for="sector">Sector:</label>
        <input type="text" class="form-control" id="sector" name="sector" maxlength="100" required value={{old('sector')}}>
    </div>

    <div class="form-group">
        <label for="municipio">Municipio:</label>
        <input type="text" class="form-control" id="municipio" name="municipio" maxlength="100" required value={{old('municipio')}}>
    </div>

    <div class="form-group">
        <label for="pais">País:</label>
        <input type="text" class="form-control" id="pais" name="pais" maxlength="100" required value={{old('pais')}}>
    </div>

    <div class="form-group">
        <label for="coordenadas">Coordenadas:</label>
        <input type="text" class="form-control" id="coordenadas" name="coordenadas" maxlength="100" required value={{old('coordenadas')}}>
    </div>

    <div class="form-group">
        <label for="estado">Estado:</label>
        <select name="estado" id="estado" class="form-control" required value={{old('estado')}}>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>


