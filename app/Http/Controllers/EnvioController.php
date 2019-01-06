<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class EnvioController extends Controller
{
    public function principal()
    {
        $paquetes = DB::table('paquete')->select('paquete.*')->get();
        $clientes = DB::table('cliente')->select('cliente.*')->get();
        return view('pages.EnvioView.Envio',['paquetes'=>$paquetes,'clientes'=>$clientes]);
    }
    public function store(Request $request)
    {

        $envid = $request->input('envid');
        $envdestino = $request->input('envdestino');
        $envprecio = $request->input('envprecio');
        $ccedula = $request->input('ccedula');

        

        
        $data = array('envid'=>$envid,'envdestino'=>$envdestino,'envprecio'=>$envprecio,'ccedula'=>$ccedula);
        DB::table('Envio')->insert($data);
        return redirect('Envios'); 
    }
    public function show(Request $request)
	{
		$busqueda = $request->input('busqueda');
        $envios = DB::table('Envio')->select('Envio.*')->where('envid',$busqueda)->get(); 
        
        $paquetes = DB::table('paquete')->select('paquete.*')->get();
        $clientes = DB::table('cliente')->select('cliente.*')->get();


        $envpaquetes = DB::table('envio')
        ->join('envioxpaquete', 'envio.envid', '=', 'envioxpaquete.envid')
        ->select('envioxpaquete.*')
        ->where('envio.envid', '=', $busqueda)
        ->get();
        return view('pages.EnvioView.EnvioSearch', ['envios'=>$envios,'envpaquetes'=>$envpaquetes,'paquetes'=>$paquetes,'clientes'=>$clientes]);
	}
	
	public function update(Request $request)
	{
        $envid = $request->input('envid');
        $envdestino = $request->input('envdestino');
        $envprecio = $request->input('envprecio');
        $ccedula = $request->input('ccedula');

        
        $data = array('envid'=>$envid,'envdestino'=>$envdestino,'envprecio'=>$envprecio,'ccedula'=>$ccedula);

        DB::table('envio')->where('envid','=', $envid)->update($data);
		return redirect('Envios');
	}
	public function delete(Request $request)
	{
        $envid = $request->input('envid');
        DB::table('envioxpaquete')->where('envid','=', $envid)->delete();
		DB::table('envio')->where('envid','=', $envid)->delete();
		return redirect('Envios');
    }
    
    public function storeDetail(Request $request)
    {
        
        $paqid = $request->input('paqid');
        $paqfechaingreso = $request->input('paqfechaingreso');
        $paqdescripcion = $request->input('paqdescripcion');
        
        $envid = $request->input('envio');
     

        
        $data = array('paqid'=>$paqid,'envid'=>$envid,'paqfechaingreso'=>$paqfechaingreso,'paqdescripcion'=>$paqdescripcion);
        DB::table('envioxpaquete')->insert($data);
        

        $busqueda = $request->input('envio');
        $envios = DB::table('envio')->select('envio.*')->where('envid',$busqueda)->get(); 
        
        $paquetes = DB::table('paquete')->select('paquete.*')->get();
        $clientes = DB::table('cliente')->select('cliente.*')->get();

        $envpaquetes = DB::table('envio')
        ->join('envioxpaquete', 'envio.envid', '=', 'envioxpaquete.envid')
        ->select('envioxpaquete.*')
        ->where('envio.envid', '=', $busqueda)
        ->get();
        return view('pages.EnvioView.EnvioSearch', ['envios'=>$envios,'envpaquetes'=>$envpaquetes,'paquetes'=>$paquetes,'clientes'=>$clientes]);
               
    }
    public function destroy($paqid)
    {
        DB::table('envioxpaquete')->where('paqid','=', $paqid)->delete();
        return redirect('Envios');

    }
}
