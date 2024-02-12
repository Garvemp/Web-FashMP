@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/suministro/'.$suministro->id) }}" method="post" >
            @csrf
            {{ method_field('PATCH') }}
            @include('suministro.form',['modo'=>'Editar']);
        </form>
</div>
@endsection