<?php 
namespace App\Http\Controllers; 
use App\Models\Factura; 
use App\Models\Cliente; 
use App\Models\Empleado; 
use Illuminate\Http\Request; 
 
class FacturaController extends Controller 
{ 
  /** 
   * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function index() 
    { 
        // 
        $datos['facturas'] = Factura::paginate(100); 
        return view('factura.index', $datos); 
    } 
    /** 
     * Show the form for creating a new resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function create() 
    { 
        // 
        $clientes = Cliente::all(); 
        $empleados = Empleado::all(); 
        return view('factura.create', compact('clientes', 'empleados')); 
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
            'cedula_cliente' => 'required|exists:clientes,cedula', 
            'id_producto' => 'required|exists:empleados,id', 
            'Unidades' => 'required|string|max:100', 
            'Metodo_pago' => 'required|string|max:100', 
        ]; 
        $mensaje = [ 
            'required' => 'El :atributo es requerido', 
            'exists' => 'El :atributo seleccionado no existe en la base de datos', 
        ]; 
        $this->validate($request, $campos,$mensaje); 
        $datosFactura = $request->except('_token'); 
        Factura::create($datosFactura); 
        return redirect('factura')->with('mensaje', 'Factura agregada con éxito!'); 
    } 
    /** 
     * Display the specified resource. 
     * 
     * @param  \App\Models\Factura  $factura 
     * @return \Illuminate\Http\Response 
     */ 

    public function show(Factura $factura) 
    { 
        // 
    } 
    /** 
     * Show the form for editing the specified resource. 
     * 
     * @param  \App\Models\Factura  $factura 
     * @return \Illuminate\Http\Response 
     */ 
    public function edit($id) 
    { 
        // 
        $factura = Factura::findOrFail($id); 
        $clientes = Cliente::all(); 
        $empleados = Empleado::all(); 
        return view('factura.edit', compact('factura', 'clientes', 'empleados')); 
    } 
    /** 
     * Update the specified resource in storage. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @param  \App\Models\Factura  $factura 
     * @return \Illuminate\Http\Response 
     */ 
    public function update(Request $request, $id) 
    { 
        // 
        $campos = [ 
            'Fecha_venta' => 'required|string|max:100', 
            'cedula_cliente' => 'required|exists:clientes,cedula', 
            'id_producto' => 'required|exists:empleados,id', 
            'Unidades' => 'required|string|max:100', 
            'Metodo_pago' => 'required|string|max:100', 
        ]; 
        $mensaje = [ 
            'required' => 'El :atributo es requerido', 
            'exists' => 'El :atributo seleccionado no existe en la base de datos', 
        ]; 
        $this->validate($request, $campos, $mensaje); 
        $datosFactura = $request->except(['_token', '_method']); 
        Factura::where('id', '=', $id)->update($datosFactura); 
        return redirect('factura')->with('mensaje', 'Factura actualizada con éxito!'); 
    } 

 

    /** 

     * Remove the specified resource from storage. 

     * 

     * @param  \App\Models\Factura  $factura 

     * @return \Illuminate\Http\Response 

     */ 

    public function destroy($id) 

    { 
        // 
        Factura::findOrFail($id)->delete(); 
        return redirect('factura')->with('mensaje', 'Factura borrada'); 

    } 

} 

 

 

 