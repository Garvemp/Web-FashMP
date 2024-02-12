@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/factura') }}" method="post" >
            @csrf
            @include('factura.form',['modo'=>'Crear']);
        </form>
    </div>
@endsection