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
        <a href="{{ url('proveedor/create') }}" class="btn btn btn-outline-success">Registrar un nuevo Proveedor</a>
        <table class="table table-light">
            <thead class="thead-light">
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo</th> 
                <th>Celular</th>
                <th>Empresa</th> 
                <th>Direccion</th>
            </thead>
            <tbody>
                @foreach($proveedor as $proveedor)
                
                <tr>
                    <td>{{ $proveedor->Cedula_P }}</td>
                    <td>{{ $proveedor->Nombre }}</td>
                    <td>{{ $proveedor->Apellido }}</td>
                    <td>{{ $proveedor->Correo }}</td>
                    <td>{{ $proveedor->Celular }}</td>
                    <td>{{ $proveedor->Empresa }}</td>
                    <td>{{ $proveedor->Direccion }}</td>

                    <td> <a href="{{ url ('/proveedor/'.$proveedor->Cedula_P.'/edit')}}" class="btn btn-outline-warning">
                        Editar
                    </a>|
                        <form action="{{ url('/proveedor/'.$proveedor->Cedula_P) }}" class="d-inline-block" method="POST" >
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

