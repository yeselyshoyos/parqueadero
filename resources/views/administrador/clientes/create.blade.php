@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <a href="{{route('clientes.index')}}">Volver</a>
        <div class="row justify-content-center">
                <div class="col-10">
                    <br>
                <form action="{{route('clientes.store')}}" method="POST" novalidate>
                        @csrf
                <input type="text" placeholder="nombre" class="form-control" name="nombre" value="{{old('nombre')}}">
                <x-error valor="nombre"></x-error>
                        <br>
                        <input type="email" placeholder="correo" class="form-control" name="email" value="{{old('email')}}">
                        <x-error valor="email"></x-error>
                        <br>
                        <input type="number" placeholder="telefono" class="form-control" name="numero" value="{{old('numero')}}">
                         <x-error valor="numero"></x-error>
                        <br>
                        <label for="">Fecha de naciemiento</label>
                        <br>
                        <input type="date" class="form-control" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
                         <x-error valor="fecha_nacimiento"></x-error>
                        <br>
                        <x-btnEnviar></x-btnEnviar>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
