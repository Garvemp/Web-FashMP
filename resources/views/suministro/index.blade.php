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
        <a href="{{ url('suministro/create') }}" class="btn btn btn-outline-success">Registrar una nueva Factura</a>
        <table class="table table-light">
            <thead class="thead-light">
                <th>#</th>
                <th>Fecha Venta</th>
                <th>Cedula proveedor</th>
                <th>Id producto</th>
                <th>Unidades</th>
                <th>Medio de pago</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($suministros as $suministro)
                
                <tr>
                    <td>{{ $suministro->id }}</td>
                    <td>{{ $suministro->Fecha_venta }}</td>
                    <td>{{ $suministro->cedula_proveedor }}</td>
                    <td>{{ $suministro->id_producto }}</td>
                    <td>{{ $suministro->Unidades }}</td>
                    <td>{{ $suministro->Metodo_pago }}</td>
                    
                    
                    <td> <a href="{{ url ('/suministro/'.$suministro->id.'/edit')}}" class="btn btn-outline-warning">
                        Editar
                    </a>|
                        <form action="{{ url('/suministro/'.$suministro->id) }}" class="d-inline-block" method="POST" >
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