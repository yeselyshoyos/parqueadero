@extends('layouts.app')
@section('content')

   <div class="conatiner">
    <div class="row justify-content-center">

       <div class="card">
               <div class="col-8">
                <div class="ml-auto">
                    <a href="{{route('clientes.create')}}" class="btn btn-info">Nuevo Cliente</a>

                </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>correo</th>
                                <th>telefono</th>
                                <th>Fecha de nacimieno</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->nombre}}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td>{{$cliente->numero}}</td>
                                    <td>{{$cliente->fecha_nacimiento}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <form action="{{route('clientes.destroy', ['cliente'=> $cliente->id])}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                 <input type="submit" value="Eliminar" class="btn btn-danger">
                                                </form>

                                            </div>
                                            <div class="col">
                                            <a href="{{route('clientes.show' ,['cliente'=> $cliente->id])}}" class="btn btn-info btn-sm">Ver</a>
                                            </div>
                                            <div class="col">
                                                <a href="{{route('clientes.edit' ,['cliente'=> $cliente->id])}}" class="btn btn-success btn-sm">Editar</a>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$clientes->links()}}
               </div>
           </div>
       </div>
   </div>
@endsection
