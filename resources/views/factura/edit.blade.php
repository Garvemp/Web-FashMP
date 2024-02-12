@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/factura/'.$factura->id) }}" method="post" >
            @csrf
            {{ method_field('PATCH') }}
            @include('factura.form',['modo'=>'Editar']);
        </form>
</div>
@endsection