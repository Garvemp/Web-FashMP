<h1>{{$modo}} Clientes</h1>
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
    <label for="cedula">Cédula:</label>
    <input type="text" class="form-control" value="{{ $cliente->cedula ?? ''}}" name="cedula" id="cedula">
<br>
<div class="form-gropu">
    <label for="Nombre">Nombre:</label>
    <input type="text" class="form-control" value="{{ $cliente->Nombre ?? ''}}"  name="Nombre" id="Nombre">
</div>      
<br>
<div class="fomr-group">
    <label for="Apellido">Apellidos:</label>
    <input type="text" class="form-control" value="{{ $cliente->Apellido ?? ''}}" name="Apellido" id="Apellido">
</div>     
<br>
<div class="form-group">
    <label for="Correo">Correo:</label>
    <input type="email" class="form-control" value="{{ $cliente->Correo ?? ''}}" name="Correo" id="Correo">
</div>
<br>

<br>
    <input class="btn btn-outline-success" type="submit" value="{{$modo}} Datos">
    <a href="{{ url('cliente/') }}" class="btn btn-outline-primary">Regresar</a>
<br>