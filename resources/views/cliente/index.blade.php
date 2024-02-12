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
        <a href="{{ url('cliente/create') }}" class="btn btn btn-outline-success">Registrar un nuevo Cliente</a>
        <table class="table table-light">
            <thead class="thead-light">
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo</th>  
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                
                <tr>
                    <td>{{ $cliente->cedula }}</td>
                    <td>{{ $cliente->Nombre }}</td>
                    <td>{{ $cliente->Apellido }}</td>
                    <td>{{ $cliente->Correo }}</td>
                    
                    <td> <a href="{{ url ('/cliente/'.$cliente->cedula.'/edit')}}" class="btn btn-outline-warning">
                        Editar
                    </a>|
                        <form action="{{ url('/cliente/'.$cliente->cedula) }}" class="d-inline-block" method="POST" >
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

