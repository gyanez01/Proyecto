<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RolDePagoModel;
use App\PersonalModel;
use DB;
class RolDePagoController extends Controller
{
    function principal()
	{
        $personal = PersonalModel::all();
		return view('pages.RolDePagoView.RolDePago', ['personal'=>$personal]);
	}

	public function store(Request $request)
    {
        $rolid = $request->input('rolid');
        $rolfecha = $request->input('rolfecha');
        $pernombre = $request->input('pernombre');
        $rolingreso = $request->input('rolingreso');
        $roldescuento = $request->input('roldescuento');
		$rolvalortotal = $request->input('rolvalortotal');
        

        $personal = DB::table('personal')->select('percedula')->where('pernombre','=',$pernombre)->get();
        $percedula;
        foreach ($personal as $persona){
            $percedula = $persona->percedula;
        }
        
		$rol = array('rolid'=>$rolid,'rolfecha'=>$rolfecha,'percedula'=>$percedula,'rolingreso'=>$rolingreso,'roldescuento'=>$roldescuento,'rolvalortotal'=>$rolvalortotal);
        RolDePagoModel::insert($rol);

        //$personal = PersonalModel::all();
        return redirect('RolDePago')->with('success', 'Se añadio correctamente');
	}
	public function show(Request $request)
	{
		$rolid = $request->input('busqueda');
		//$clientes = ClienteModel::find($cedula);
		$roles = RolDePagoModel::where('rolid',$rolid)->get();
        
        
        $personal = PersonalModel::all();
		return view('pages.RolDePagoView.RolDePagoSearch', ['roles'=>$roles,'personal'=>$personal]);

	}

	public function update(Request $request)
	{
		
		$rolid = $request->input('rolid');
        $rolfecha = $request->input('rolfecha');
        $pernombre = $request->input('pernombre');
        $rolingreso = $request->input('rolingreso');
        $roldescuento = $request->input('roldescuento');
		$rolvalortotal = $request->input('rolvalortotal');
        

        $personal = DB::table('personal')->select('percedula')->where('pernombre','=',$pernombre)->get();
        $percedula;
        foreach ($personal as $persona){
            $percedula = $persona->percedula;
        }
        
		$rol = array('rolid'=>$rolid,'rolfecha'=>$rolfecha,'percedula'=>$percedula,'rolingreso'=>$rolingreso,'roldescuento'=>$roldescuento,'rolvalortotal'=>$rolvalortotal);
        RolDePagoModel::where('rolid','=', $rolid)->update($rol);
        
        //$personal = DB::table('personal')->select('personal.*')->get();
		return redirect('RolDePago')->with('success', 'Se modifico correctamente');;
        
	}

	public function delete(Request $request)
	{
		
		$rolid = $request->input('rolid');
        RolDePagoModel::where('rolid','=', $rolid)->delete();
        $personal = DB::table('personal')->select('personal.*')->get();
		return redirect('RolDePago')->with('success', 'Se elimino correctamente');;
        
	}
}
