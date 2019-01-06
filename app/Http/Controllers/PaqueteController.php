<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaqueteModel;
class PaqueteController extends Controller
{
    function principal()
	{
		return view('pages.PaqueteView.Paquetes');
	}

	public function store(Request $request)
    {

        $paqid = $request->input('paqid');
        $paqdescripcion = $request->input('paqdescripcion');
        $paqfechaingreso = $request->input('paqfechaingreso');
        $paquete = array('paqid'=>$paqid,'paqdescripcion'=>$paqdescripcion,'paqfechaingreso'=>$paqfechaingreso);
        
        PaqueteModel::insert($paquete);
        return redirect('Paquetes')->with('success', 'Se añadio correctamente');
	}
	public function show(Request $request)
	{
		$id = $request->input('busqueda');
		
		$paquetes = PaqueteModel::where('paqid',$id)->get();
		
		return view('pages.PaqueteView.PaquetesSearch', ['paquetes'=>$paquetes]);

	}

	public function update(Request $request)
	{
		
		$paqid = $request->input('paqid');
        $paqdescripcion = $request->input('paqdescripcion');
        $paqfechaingreso = $request->input('paqfechaingreso');
        $paquete = array('paqid'=>$paqid,'paqdescripcion'=>$paqdescripcion,'paqfechaingreso'=>$paqfechaingreso);
        PaqueteModel::where('paqid','=', $paqid)->update($paquete);
		return redirect('Paquetes')->with('success', 'Se modifico correctamente');
        
	}

	public function delete(Request $request)
	{
		
		$id = $request->input('paqid');
		PaqueteModel::where('paqid','=', $id)->delete();
		return redirect('Paquetes')->with('success', 'Se elimino correctamente');
        
	}
}
