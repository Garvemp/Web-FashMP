<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes']=Cliente::paginate(100);
        return view ('cliente.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validacion  de campos
        $campos=[
            'cedula'=>'required|string|max:100',
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Correo'=>'required|string|max:100',
            
        ];

        $mensaje=[
            'required'=>'El :atributo es requerido',
            'unique' => 'El :atributo ya existe en la base de datos',
        ];

        $this->validate($request, $campos,$mensaje);
        // Obtener los datos del formulario
        $datosCliente = request()->except(['_token','_method']);
        // Insertar los datos en la tabla de clientes
        cliente::insert($datosCliente);
        return redirect('cliente')->with('mensaje','Cliente agregado con Exito!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($cedula)
    {
        //
        $cliente=Cliente::findOrFail($cedula);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cedula)
    {
        //

        //validacion  de campos
        $campos=[
            'cedula'=>'required|string|max:100',
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Correo'=>'required|string|max:100',
            
        ];
        $mensaje=[
            'required'=>'El :atributo es requerido',
        ];
        

        $datosCliente = request()->except(['_token','_method']);
        
        Cliente::where('cedula','=',$cedula)->update($datosCliente);
        $cliente=Cliente::findOrFail($cedula);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($cedula)
    {
        //
        $cliente=Cliente::findOrFail($cedula);
        Cliente::destroy($cedula);
        return redirect('cliente')->with('mensaje','Cliente Borrado con Exito!');
    }
}
