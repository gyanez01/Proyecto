<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class InventarioController extends Controller
{
    
    public function principal()
    {
        $equipos = DB::table('equipo')->select('equipo.*')->get();
        $sucursales = DB::table('sucursal')->select('sucursal.*')->get();
        return view('pages.InventarioView.Inventario',['equipos'=>$equipos,'sucursales'=>$sucursales]);
    }
    public function store(Request $request)
    {
        $invid = $request->input('invid');
        $invobservacion = $request->input('invobservacion');
        $invfecha = $request->input('invfecha');
        $sucnombre = $request->input('sucnombre');

        $sucursales = DB::table('sucursal')->select('sucid')->where('sucnombre','=',$sucnombre)->get();
        $sucid;
        foreach ($sucursales as $sucursal){
            $sucid = $sucursal->sucid;
        }

        
        $data = array('invid'=>$invid,'invobservacion'=>$invobservacion,'invfecha'=>$invfecha,'sucid'=>$sucid);
        DB::table('Inventario')->insert($data);
        return redirect('Inventarios'); 
    }
    public function show(Request $request)
	{
		$busqueda = $request->input('busqueda');
        $items = DB::table('inventario')->select('inventario.*')->where('invid',$busqueda)->get(); 
        
        $equipos = DB::table('equipo')->select('equipo.*')->get();
        $sucursales = DB::table('sucursal')->select('sucursal.*')->get();


        $invequipos = DB::table('inventario')
        ->join('inventarioxequipo', 'inventario.invid', '=', 'inventarioxequipo.invid')
        ->select('inventarioxequipo.*')
        ->where('inventario.invid', '=', $busqueda)
        ->get();
        return view('pages.InventarioView.InventarioSearch', ['items'=>$items,'invequipos'=>$invequipos,'equipos'=>$equipos,'sucursales'=>$sucursales]);
	}
	
	public function update(Request $request)
	{
        $invid = $request->input('invid');
        $invobservacion = $request->input('invobservacion');
        $invfecha = $request->input('invfecha');
        $sucnombre = $request->input('sucnombre');

        $sucursales = DB::table('sucursal')->select('sucid')->where('sucnombre','=',$sucnombre)->get();
        $sucid;
        foreach ($sucursales as $sucursal){
            $sucid = $sucursal->sucid;
        }

        
        $data = array('invid'=>$invid,'invobservacion'=>$invobservacion,'invfecha'=>$invfecha,'sucid'=>$sucid);

        DB::table('Inventario')->where('invid','=', $invid)->update($data);
		return redirect('Inventarios');
	}
	public function delete(Request $request)
	{
        $invid = $request->input('invid');
        DB::table('inventarioxequipo')->where('invid','=', $invid)->delete();
		DB::table('inventario')->where('invid','=', $invid)->delete();
		return redirect('Inventarios');
    }
    
    public function storeDetail(Request $request)
    {
        
        $eqcodigo = $request->input('eqcodigo');
        $eqnombre = $request->input('eqnombre');
        $eqdescripcion = $request->input('eqdescripcion');
        $eqfechaadquicision = $request->input('eqfechaadquicision');
        $invid = $request->input('inventario');
     

        
        $data = array('eqcodigo'=>$eqcodigo,'invid'=>$invid,'eqnombre'=>$eqnombre,'eqdescripcion'=>$eqdescripcion,'eqfechaadquicision'=>$eqfechaadquicision);
        DB::table('inventarioxequipo')->insert($data);
        

        $busqueda = $request->input('inventario');
        $items = DB::table('inventario')->select('inventario.*')->where('invid',$busqueda)->get(); 
        
        $equipos = DB::table('equipo')->select('equipo.*')->get();
        $sucursales = DB::table('sucursal')->select('sucursal.*')->get();

        $invequipos = DB::table('inventario')
        ->join('inventarioxequipo', 'inventario.invid', '=', 'inventarioxequipo.invid')
        ->select('inventarioxequipo.*')
        ->where('inventario.invid', '=', $busqueda)
        ->get();
        return view('pages.InventarioView.InventarioSearch', ['items'=>$items,'invequipos'=>$invequipos,'equipos'=>$equipos,'sucursales'=>$sucursales]);
               
    }
    public function destroy($eqcodigo)
    {
        DB::table('inventarioxequipo')->where('eqcodigo','=', $eqcodigo)->delete();

        $equipos = DB::table('equipo')->select('equipo.*')->get();
        $sucursales = DB::table('sucursal')->select('sucursal.*')->get();
        return view('pages.InventarioView.Inventario',['equipos'=>$equipos,'sucursales'=>$sucursales]);

    }

}
