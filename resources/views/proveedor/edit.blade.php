@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/proveedor/'.$proveedor->Cedula_P) }}" method="post" >
            @csrf
            {{ method_field('PATCH') }}
            @include('proveedor.form',['modo'=>'Editar']);
        </form>
</div>
@endsection