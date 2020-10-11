@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
        <h1>Lista de vehiculos</h1>
    </div>
    <div class="col-md-4">
    <a href="{{route('vehiculos.create')}}" class="btn btn-outline-info">Nuevo Vehiculo</a>
    </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>placa</th>
                <th>Propietario</th>
                <th>opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehiculos as $vehiculo)
                <tr>
                <td>{{$vehiculo->placa}}</td>
                <td>{{$vehiculo->conductor}}</td>
                <td>
                    <div class="row">
                        <div class="col">
                        <form action="{{route('vehiculos.destroy', ['vehiculo'=> $vehiculo->id])}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Eliminar" class="btn btn-outline-danger btn-sm w-100">
                        </form>

                        </div>
                        <div class="col">
                        <a href="{{route('vehiculos.edit',['vehiculo'=> $vehiculo->id])}}" class="btn btn-outline-success btn-sm w-100">Editar</a>
                        </div>
                        <div class="col">
                        <a href="{{route('vehiculos.show',['vehiculo'=>$vehiculo->id])}}" class="btn btn-outline-info btn-sm w-100">Ver</a>
                        </div>
                    </div>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$vehiculos->links()}}
</div>
@endsection
