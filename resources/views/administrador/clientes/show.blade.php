@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <a href="{{route('clientes.index')}}">Volver</a>
        <div class="row justify-content-center">
                <div class="col-10">
                    <br>

                <input disabled type="text" placeholder="nombre" class="form-control" name="nombre" value="{{$cliente->nombre}}">
                        <br>
                        <input disabled type="email" placeholder="correo" class="form-control" name="email" value="{{$cliente->email}}">
                        <x-error valor="email"></x-error>
                        <br>
                        <input disabled type="number" placeholder="telefono" class="form-control" name="numero" value="{{$cliente->numero}}">
                        <br>
                        <label for="">Fecha de naciemiento</label>
                        <br>
                        <input disabled type="date" class="form-control" name="fecha_nacimiento" value="{{$cliente->fecha_nacimiento}}">
                        <br>

                </div>
            </div>
        </div>
    </div>
@endsection
