<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['proveedor']=Proveedor::paginate(100);
        return view ('proveedor.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proveedor.create');
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
            'Cedula_P'=>'required|string|max:100',
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Correo'=>'required|string|max:100',
            'Celular'=>'required|string|max:100',
            'Empresa'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :atributo es requerido',
            'unique' => 'El :atributo ya existe en la base de datos',
        ];

        $this->validate($request, $campos,$mensaje);
        // Obtener los datos del formulario
        $datosProveedor = request()->except(['_token','_method']);
        // Insertar los datos en la tabla de clientes
        Proveedor::insert($datosProveedor);
        return redirect('proveedor')->with('mensaje','Proveedor agregado con Exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($Cedula_P)
    {
        //
        $proveedor=Proveedor::findOrFail($Cedula_P);
        return view('proveedor.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Cedula_P)
    {
        //
        //validacion  de campos
        $campos=[
            'Cedula_P'=>'required|string|max:100',
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Correo'=>'required|string|max:100',
            'Celular'=>'required|string|max:100',
            'Empresa'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            
        ];
        $mensaje=[
            'required'=>'El :atributo es requerido',
        ];
        

        $datosProveedor = request()->except(['_token','_method']);
        
        Proveedor::where('Cedula_P','=',$Cedula_P)->update($datosProveedor);
        $proveedor=Proveedor::findOrFail($Cedula_P);
        return view('proveedor.edit', compact('proveedor'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($Cedula_P)
    {
        //
        $proveedor=Proveedor::findOrFail($Cedula_P);
        Proveedor::destroy($Cedula_P);
        return redirect('proveedor')->with('mensaje','Proveedor Borrado con Exito!');
    }
}
