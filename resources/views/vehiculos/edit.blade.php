@extends('layouts.app')

@section('content')

<div class="container">
<a href="{{route('vehiculos.index')}}">Volver</a>
    <form action="{{route('vehiculos.update',['vehiculo'=>$vehiculo->id])}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Placa</label>
            <input type="text" name="placa" class="form-control" value="{{$vehiculo->placa}}">
            @error('placa')
                <div class="bg-danger text-white">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Conductor</label>
        <input type="text" name="conductor" class="form-control" value="{{$vehiculo->conductor}}">
            @error('conductor')
            <div class="bg-danger text-white">{{$message}}</div>
            @enderror
        </div>
        <input type="submit" value="Guardar">
    </form>
</div>
@endsection


