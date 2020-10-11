<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        //obtenemos los ultimos registros con latest y el paginate nos sirve para paginar los datos
        $clientes= Cliente::latest()->paginate(3);

        //retornamos a la vista index de clientes q se encuentra en la carpeta resouce view administrador clientes
       //con el metodo compact enviamos los datos de la variable clientes
        return view('administrador.clientes.index', compact('clientes'));
    }


    public function create()
    {
        //retornamos a la vista create de clientes q se encuentra en la carpeta resouce view administrador clientes
        //Formulario de nuevo cliente
        return view('administrador.clientes.create');
    }


    public function store(Request $request)
    {
        //llamamos la funcion validar
        $data= $this->validar($request);

        $cliente=  new Cliente();

        //una vez validado rellenamos nuestro objeto llamando la funcion rellenar
        $this->rellenar($cliente,$data);

        //guardamos el nuevo cliente
        $cliente->save();

        return redirect()->action('ClienteController@index')->with('mensaje', 'Cliente guardado correctamente');



    }

    public function show(Cliente $cliente)
    {
        //retornamos a la vista show q nos permite ver el cliente q se encuentra en la carpeta resouce view administrador clientes
       //con el metodo compact enviamos los datos de la variable cliente

        return view('administrador.clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
         //retornamos a la vista edit q nos permite editar el cliente q se encuentra en la carpeta resouce view administrador clientes
       //con el metodo compact enviamos los datos de la variable cliente
        return view('administrador.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //llamamos la funcion validar y guardamos sus datos
        $data= $this->validar($request);
        //una vez validado rellenamos nuestro objeto llamando la funcion rellenar
        $this->rellenar($cliente,$data);
        //guardamos los cambios
        $cliente->save();

        return redirect()->action('ClienteController@index')->with('mensaje', 'Cliente actulizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {   //eliminamos el clinete
        $cliente->delete();
        //retornamos una vista atras con un mensaje
        return back()->with('mensaje', 'Cliente eliminado');
    }

    //creamos este metodo para validar los datos ya que seran utilizados en el store y update
    private function validar($request)
    {
        return $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email',
            'numero' => 'required|integer',
            'fecha_nacimiento' => 'required|date'
        ]);
    }

    //creamos este metodo para rellenar los datos del cliente ya que seran utilizados en el store y update

private function rellenar(Cliente $cliente, $data)
{

    $cliente->nombre = $data['nombre'];
    $cliente->numero = $data['numero'];
    $cliente->email = $data['email'];
    $cliente->fecha_nacimiento = $data['fecha_nacimiento'];
}
}
