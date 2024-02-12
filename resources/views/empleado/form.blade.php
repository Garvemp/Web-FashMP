<h1>{{$modo}} Productos</h1>
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-gropu">
    <label for="Nombre">Nombre:</label>
    <input type="text" class="form-control" value="{{ $empleado->Nombre ?? ''}}"  name="Nombre" id="Nombre">
</div>      
<br>
<div class="fomr-group">
    <label for="Precio">Precio:</label>
    <input type="text" class="form-control" value="{{ $empleado->Precio ?? ''}}" name="Precio" id="Precio">
</div>     
<br>
<div class="form-group">
    <label for="Categoria">Categoria:</label>
    <input type="text" class="form-control" value="{{ $empleado->Categoria ?? ''}}" name="Categoria" id="Categoria">
</div>
<br>
<div class="form-group">
    <label for="Proveedor">Proveedor:</label>
    <input type="text" class="form-control" value="{{ $empleado->Proveedor ?? ''}}" name="Proveedor" id="Proveedor">
<br>
<div class="form-group">
    <label for="Color">Color:</label>
    <input type="text" class="form-control" value="{{ $empleado->Color ?? ''}}" name="Color" id="Color">
<br>
<div class="form-group">
    <label for="Cantidad">Cantidad:</label>
    <input type="text" class="form-control" value="{{ $empleado->Cantidad ?? ''}}" name="Cantidad" id="Cantidad">
<br>
<div class="form-group">
    <label for="Fecha">Fecha ingreso:</label>
    <input type="date" class="form-control" value="{{ $empleado->Fecha ?? ''}}" name="Fecha" id="Fecha">
<br>
<div class="form-group">
    <label for="Descripcion">Descripcion del Producto:</label>
    <input type="text" class="form-control" value="{{ $empleado->Descripcion ?? ''}}" name="Descripcion" id="Descripcion">
<br>
<div class="form-group">
    <label for="Foto">Foto:</label>
    {{-- mostrar la ruta de la foto donde se guardo --}}
    {{-- {{$empleado->Foto ?? ''}} --}}
    @if(isset($empleado->Foto))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width=100 alt="">
    @endif
    <input class="form-control" type="file" name="Foto" value="" id="Foto">
</div>
<br>
    <input class="btn btn-outline-success" type="submit" value="{{$modo}} Datos">
    <a href="{{ url('empleado/') }}" class="btn btn-outline-primary">Regresar</a>
<br>