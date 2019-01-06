<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SucursalModel;
class SucursalController extends Controller
{
    function principal()
	{
		return view('pages.SucursalView.Sucursales');
	}

	public function store(Request $request)
    {
        SucursalModel::create($request->all());
        return redirect('Sucursales')->with('success', 'Se añadio correctamente');
	}
	public function show(Request $request)
	{
		$sucid = $request->input('busqueda');
		$sucursales = SucursalModel::where('sucid',$sucid)->get();
		return view('pages.SucursalView.SucursalesSearch', ['sucursales'=>$sucursales]);

	}
	public function update(Request $request)
	{
		
		$sucid = $request->input('sucid');
		$sucnombre = $request->input('sucnombre');
        $sucdireccion = $request->input('sucdireccion');
        $suctelefono = $request->input('suctelefono');
        $sucfechaapertura = $request->input('sucfechaapertura');
		$sucursal = array('sucid'=>$sucid,'sucdireccion'=>$sucdireccion,'suctelefono'=>$suctelefono,'sucfechaapertura'=>$sucfechaapertura,'sucnombre'=>$sucnombre);
		SucursalModel::where('sucid','=', $sucid)->update($sucursal);
		return redirect('Sucursales')->with('success', 'Se modifico correctamente');   
	}
	public function delete(Request $request)
	{
		$sucid = $request->input('sucid');
		SucursalModel::where('sucid','=', $sucid)->delete();
		return redirect('Sucursales')->with('success', 'Se elimino correctamente');
	}
}
