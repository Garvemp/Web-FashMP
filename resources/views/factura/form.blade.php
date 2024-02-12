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
<form action="{{ isset($factura) ? url('factura/'.$factura->id) : url('factura') }}" method="POST">
    @csrf
    @if(isset($factura))
        @method('PUT')
    @endif
    <div class="form-gropu">
        <label for="Fecha_venta">Fecha de la compra:</label>
        <input type="date" class="form-control" value="{{ $factura->Fecha_venta ?? ''}}"  name="Fecha_venta" id="Fecha_venta">
    </div>      
    <br>
    <div class="form-group">
        <label for="cedula_cliente">Cédula Cliente:</label>
        <select class="form-control" name="cedula_cliente" id="cedula_cliente">
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->cedula }}" {{ (isset($factura) && $factura->cedula_cliente == $cliente->cedula) ? 'selected' : '' }}>
                    {{ $cliente->cedula }} - {{ $cliente->Nombre }} {{ $cliente->Apellido }}
                </option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="form-group">
        <label for="id_producto">ID Producto:</label>
        <select class="form-control" name="id_producto" id="id_producto">
            @foreach($empleados as $empleado)
                <option value="{{ $empleado->id }}" {{ (isset($factura) && $factura->id_producto == $empleado->id) ? 'selected' : '' }}>
                    {{ $empleado->id }} - {{ $empleado->Nombre }} {{ $empleado->Precio }}
                </option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="form-group">
        <label for="Unidades">Unidades:</label>
        <input type="text" class="form-control" name="Unidades" id="Unidades" value="{{ $factura->Unidades ?? old('Unidades') }}">
    </div>
    <br>
    <div class="form-group">
        <label for="Metodo_pago">Método de Pago:</label>
        <input type="text" class="form-control" value="{{ $factura->Metodo_pago ?? ''}}"  name="Metodo_pago" id="Metodo_pago">
    </div>
    <br>
    <input class="btn btn-outline-success" type="submit" value="{{ $modo }} Factura">
    <a href="{{ url('factura/') }}" class="btn btn-outline-primary">Regresar</a>
</form>



