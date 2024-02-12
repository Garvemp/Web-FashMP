<?php

namespace App\Http\Controllers;

use App\Models\Suministro;
use App\Models\Proveedor; 
use App\Models\Empleado;
use Illuminate\Http\Request;

class SuministroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['suministros'] = Suministro::paginate(100); 
        return view('suministro.index', $datos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedors = Proveedor::all(); 
        $empleados = Empleado::all(); 
        return view('suministro.create', compact('proveedors', 'empleados')); 
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
        $campos = [ 
            'Fecha_venta' => 'required|string|max:100', 
            'cedula_proveedor' => 'required|exists:proveedors,Cedula_P', 
            'id_producto' => 'required|exists:empleados,id', 
            'Unidades' => 'required|string|max:100', 
            'Metodo_pago' => 'required|string|max:100', 
        ]; 
        $mensaje = [ 
            'required' => 'El :atributo es requerido', 
            'exists' => 'El :atributo seleccionado no existe en la base de datos', 
        ]; 
        $this->validate($request, $campos, $mensaje); 
    
        $datosSuministro = $request->except('_token'); 
        Suministro::create($datosSuministro); 
    
        return redirect('suministro')->with('mensaje', 'Factura agregada con éxito!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suministro  $suministro
     * @return \Illuminate\Http\Response
     */
    public function show(Suministro $suministro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suministro  $suministro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $suministro = Suministro::findOrFail($id); 
        $proveedors = Proveedor::all(); 
        $empleados = Empleado::all(); 
        return view('suministro.edit', compact('suministro', 'proveedors', 'empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suministro  $suministro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [ 
            'Fecha_venta' => 'required|string|max:100', 
            'cedula_proveedor' => 'required|exists:proveedors,Cedula_P', 
            'id_producto' => 'required|exists:empleados,id', 
            'Unidades' => 'required|string|max:100', 
            'Metodo_pago' => 'required|string|max:100', 
        ]; 
        $mensaje = [ 
            'required' => 'El :atributo es requerido', 
            'exists' => 'El :atributo seleccionado no existe en la base de datos', 
        ]; 
        $this->validate($request, $campos, $mensaje); 
        $datosSuministro = $request->except(['_token', '_method']); 
        Suministro::where('id', '=', $id)->update($datosSuministro); 
        return redirect('suministro')->with('mensaje', 'Factura actualizada con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suministro  $suministro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Suministro::findOrFail($id)->delete(); 
        return redirect('suministro')->with('mensaje', 'Factura borrada');
    }
}
