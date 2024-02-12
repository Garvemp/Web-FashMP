<h1>{{$modo}} Proveedores</h1>
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="Cedula_P">Cédula:</label>
    <input type="text" class="form-control" value="{{ $proveedor->Cedula_P ?? ''}}" name="Cedula_P" id="Cedula_P">
<br>
<div class="form-gropu">
    <label for="Nombre">Nombre:</label>
    <input type="text" class="form-control" value="{{ $proveedor->Nombre ?? ''}}"  name="Nombre" id="Nombre">
</div>      
<br>
<div class="fomr-group">
    <label for="Apellido">Apellidos:</label>
    <input type="text" class="form-control" value="{{ $proveedor->Apellido ?? ''}}" name="Apellido" id="Apellido">
</div>     
<br>
<div class="form-group">
    <label for="Correo">Correo:</label>
    <input type="email" class="form-control" value="{{ $proveedor->Correo ?? ''}}" name="Correo" id="Correo">
</div>
<br>
<div class="form-group">
    <label for="Celular">Celular:</label>
    <input type="text" class="form-control" value="{{ $proveedor->Celular ?? ''}}" name="Celular" id="Celular">
</div>
<br>
<div class="form-group">
    <label for="Empresa">Empresa:</label>
    <input type="text" class="form-control" value="{{ $proveedor->Empresa ?? ''}}" name="Empresa" id="Empresa">
</div>
<br>
<div class="form-group">
    <label for="Direccion">Dirección:</label>
    <input type="text" class="form-control" value="{{ $proveedor->Direccion ?? ''}}" name="Direccion" id="Direccion">
</div>
<br>

<br>
    <input class="btn btn-outline-success" type="submit" value="{{$modo}} Datos">
    <a href="{{ url('proveedor/') }}" class="btn btn-outline-primary">Regresar</a>
<br>