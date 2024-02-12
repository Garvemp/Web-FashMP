<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::paginate(100);
        return view ('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion  de campos
        $campos=[
            
            'Nombre'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
            'Categoria'=>'required|string|max:100',
            'Proveedor'=>'required|string|max:100',
            'Color'=>'required|string|max:100',
            'Cantidad'=>'required|string|max:100',
            'Fecha'=>'required|string|max:100',
            'Descripcion'=>'required|string|max:100',
            'Foto'=>'required|max:1000|mimes:jpeg,jpg,png'
        ];

        $mensaje=[
            'required'=>'El :atributo es requerido',
            'Foto.required'=>'La foto es requerida'
        ];

        
        $this->validate($request, $campos,$mensaje);


        $datosEmpleado = request()->except('_token');
        if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        
        empleado::insert($datosEmpleado);
        return redirect('empleado')->with('mensaje','Producto agregado con Exito!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //validacion  de campos
        $campos=[
            
            'Nombre'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
            'Categoria'=>'required|string|max:100',
            'Proveedor'=>'required|string|max:100',
            'Color'=>'required|string|max:100',
            'Cantidad'=>'required|string|max:100',
            'Fecha'=>'required|string|max:100',
            'Descripcion'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :atributo es requerido',
        ];
        
        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:1000|mimes:jpeg,jpg,png'];
            $mensaje=['Foto.required'=>'La foto es requerida'];
        }
        


        $datosEmpleado = request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            $empleado=Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Empleado::where('id','=',$id)->update($datosEmpleado);
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        if(Storage::delete('public/'.$empleado->Foto)){
        Empleado::destroy($id);
        }
        
        return redirect('empleado')->with('mensaje','Producto Borrado');

    }
}
