<h1>{{$modo}} Facturas</h1>
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ isset($suministro) ? url('suministro/'.$suministro->id) : url('suministro') }}" method="POST">
    @csrf
    @if(isset($suministro))
        @method('PUT')
    @endif
    <div class="form-gropu">
        <label for="Fecha_venta">Fecha de la compra:</label>
        <input type="date" class="form-control" value="{{ $suministro->Fecha_venta ?? ''}}"  name="Fecha_venta" id="Fecha_venta">
    </div>      
    <br>
    <div class="form-group">
        <label for="cedula_proveedor">Cédula proveedor:</label>
        <select class="form-control" name="cedula_proveedor" id="cedula_proveedor">
            @foreach($proveedors as $proveedor)
                <option value="{{ $proveedor->Cedula_P }}" {{ (isset($suministro) && $suministro->cedula_proveedor == $proveedor->Cedula_P) ? 'selected' : '' }}>
                    {{ $proveedor->Cedula_P }} - {{ $proveedor->Nombre }} {{ $proveedor->Apellido }}
                </option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="form-group">
        <label for="id_producto">ID Producto:</label>
        <select class="form-control" name="id_producto" id="id_producto">
            @foreach($empleados as $empleado)
                <option value="{{ $empleado->id }}" {{ (isset($suministro) && $suministro->id_producto == $empleado->id) ? 'selected' : '' }}>
                    {{ $empleado->id }} - {{ $empleado->Nombre }} {{ $empleado->Precio }}
                </option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="form-group">
        <label for="Unidades">Unidades:</label>
        <input type="text" class="form-control" name="Unidades" id="Unidades" value="{{ $suministro->Unidades ?? old('Unidades') }}">
    </div>
    <br>
    <div class="form-group">
        <label for="Metodo_pago">Método de Pago:</label>
        <input type="text" class="form-control" value="{{ $suministro->Metodo_pago ?? ''}}"  name="Metodo_pago" id="Metodo_pago">
    </div>
    <br>
    <input class="btn btn-outline-success" type="submit" value="{{ $modo }} Factura">
    <a href="{{ url('suministro/') }}" class="btn btn-outline-primary">Regresar</a>
</form>

