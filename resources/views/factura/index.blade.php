@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fada show" role="alert">
            {{ Session::get('mensaje') }}
            
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
        </div>
        @endif
        <a href="{{ url('factura/create') }}" class="btn btn btn-outline-success">Registrar una nueva Factura</a>
        <table class="table table-light">
            <thead class="thead-light">
                <th>#</th>
                <th>Fecha Venta</th>
                <th>Cedula cliente</th>
                <th>Id producto</th>
                <th>Unidades</th>
                <th>Medio de pago</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($facturas as $factura)
                
                <tr>
                    <td>{{ $factura->id }}</td>
                    <td>{{ $factura->Fecha_venta }}</td>
                    <td>{{ $factura->cedula_cliente }}</td>
                    <td>{{ $factura->id_producto }}</td>
                    <td>{{ $factura->Unidades }}</td>
                    <td>{{ $factura->Metodo_pago }}</td>
                    
                    
                    <td> <a href="{{ url ('/factura/'.$factura->id.'/edit')}}" class="btn btn-outline-warning">
                        Editar
                    </a>|
                        <form action="{{ url('/factura/'.$factura->id) }}" class="d-inline-block" method="POST" >
                            @csrf 
                            @method('DELETE')
                            <input class="btn btn-outline-danger" type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection