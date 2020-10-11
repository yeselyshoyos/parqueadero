<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Vehiculo;


class VehiculoController extends Controller
{
    //solo los usuarios tienen que estar autenticados
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        $vehiculos=Vehiculo::latest()->paginate(5);
        //mostrar la pagina de inicio del modelo
        //compact es para enviar variables a una vista
        return view('vehiculos.index',compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //redireciona a la vista de formulario nuevo o crear

        return view('vehiculos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validamos la informacion
        $data=$request->validate([
            'placa' => 'required|min:6',
            'conductor'=> 'required'
        ]);
        //creamos el nuevo vehiculo
        $vehiculo= new Vehiculo();
        $vehiculo->placa= $data['placa'];
        $vehiculo->conductor= $data['conductor'];
        $vehiculo->save();
            return redirect()->route('vehiculos.index')->with('mensaje','Vehiculo Agregado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        //redireciona a la vista de formulario actulizar
        return view('vehiculos.edit', compact('vehiculo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        //validamos
        $data=$request->validate([
            'placa' => 'required|min:6',
            'conductor'=> 'required'
        ]);
        //pasamos los nuevos datos
        $vehiculo->placa= $data['placa'];
        $vehiculo->conductor= $data['conductor'];
        $vehiculo->save();
        return redirect()->route('vehiculos.index')->with('mensaje','Vehiculo actualizado de '.$vehiculo->conductor);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return back()->with('mensaje','Vehiculo Eliminado');
    }
}
