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
        <a href="{{ url('empleado/create') }}" class="btn btn btn-outline-success">Registrar un nuevo Producto</a>
        <table class="table table-light">
            <thead class="thead-light">
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Proveedor</th>
                <th>Color</th>
                <th>Cantidad</th>
                <th>Fecha Ingreso</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>
                        <img class="img-thumbnail img-fluid" src=" {{ asset('storage').'/'.$empleado->Foto }}" width="100" alt="">
                    </td>
                    
                    <td>{{ $empleado->Nombre }}</td>
                    <td>{{ $empleado->Precio }}</td>
                    <td>{{ $empleado->Categoria }}</td>
                    <td>{{ $empleado->Proveedor }}</td>
                    <td>{{ $empleado->Color }}</td>
                    <td>{{ $empleado->Cantidad }}</td>
                    <td>{{ $empleado->Fecha }}</td>
                    <td>{{ $empleado->Descripcion }}</td>
                    
                    <td> 
                        <a href="{{ url ('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-outline-warning">
                        Editar
                        </a>|
                        <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline-block" method="POST" >
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