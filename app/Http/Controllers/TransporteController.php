<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransporteModel;

class TransporteController extends Controller
{
    function principal()
	{
		return view('pages.TransporteView.Transportes');
	}

	public function store(Request $request)
    {
        TransporteModel::create($request->all());
        redirect('Transportes')->with('success', 'Se añadio correctamente');
	}
	public function show(Request $request)
	{
		$traplaca = $request->input('busqueda');
		
		$transportes = TransporteModel::where('traplaca',$traplaca)->get();
		
		return view('pages.TransporteView.TransportesSearch', ['transportes'=>$transportes]);

	}

	public function update(Request $request)
	{
		
		$traplaca = $request->input('traplaca');
        $tramarca = $request->input('tramarca');
        $tratipo = $request->input('tratipo');
        $traanio = $request->input('traanio');
        
		
		$transporte = array('traplaca'=>$traplaca,'tramarca'=>$tramarca,'tratipo'=>$tratipo,'traanio'=>$traanio);
		TransporteModel::where('traplaca','=', $traplaca)->update($transporte);
		return redirect('Transportes')->with('success', 'Se modifico correctamente');
        
	}

	public function delete(Request $request)
	{
		
		$traplaca = $request->input('traplaca');
		TransporteModel::where('traplaca','=', $traplaca)->delete();
		return redirect('Transportes')->with('success', 'Se elimino correctamente');
        
	}

}
