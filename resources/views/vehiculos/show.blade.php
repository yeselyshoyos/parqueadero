{{-- heredamos de layoust.app --}}
@extends('layouts.app')

@section('content')

<div class="container">
<a href="{{route('vehiculos.index')}}">Volver</a>

        <div class="form-group">
            <label for="">Placa</label>
            <input type="text" name="placa" class="form-control" disabled value="{{$vehiculo->placa}}">
            @error('placa')
                <div class="bg-danger text-white">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Conductor</label>
        <input type="text" name="conductor" class="form-control" disabled value="{{$vehiculo->conductor}}">

        @error('conductor')
            <div class="bg-danger text-white">{{$message}}</div>
            @enderror
        </div>

</div>
@endsection


