<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EquipoModel;
class EquipoController extends Controller
{
    
    function principal()
	{
		return view('pages.EquipoView.Equipos');
	}

	public function store(Request $request)
    {
        EquipoModel::create($request->all());
        return redirect('Equipos')->with('success', 'Se añadio correctamente');
	}
	public function show(Request $request)
	{
		$codigo = $request->input('busqueda');
		$equipos = EquipoModel::where('eqcodigo',$codigo)->get();
		return view('pages.EquipoView.EquiposSearch', ['equipos'=>$equipos]);
	}

	public function update(Request $request)
	{
		$eqcodigo = $request->input('eqcodigo');
        $eqnombre = $request->input('eqnombre');
        $eqdescripcion = $request->input('eqdescripcion');
        $eqfechaadquicision = $request->input('eqfechaadquicision');
		$equipo = array('eqcodigo'=>$eqcodigo,'eqnombre'=>$eqnombre,'eqdescripcion'=>$eqdescripcion,'eqfechaadquicision'=>$eqfechaadquicision);
		EquipoModel::where('eqcodigo','=', $eqcodigo)->update($equipo);
		return redirect('Equipos')->with('success', 'Se modifico correctamente');;
	}

	public function delete(Request $request)
	{
		$eqcodigo = $request->input('eqcodigo');
		EquipoModel::where('eqcodigo','=', $eqcodigo)->delete();
		return redirect('Equipos')->with('success', 'Se elimino correctamente');;
	}
}
