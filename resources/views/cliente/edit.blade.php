@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/cliente/'.$cliente->cedula) }}" method="post" >
            @csrf
            {{ method_field('PATCH') }}
            @include('cliente.form',['modo'=>'Editar']);
        </form>
</div>
@endsection

