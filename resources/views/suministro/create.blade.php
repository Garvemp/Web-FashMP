@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/suministro') }}" method="post" >
            @csrf
            @include('suministro.form',['modo'=>'Crear']);
        </form>
    </div>
@endsection