<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class EntregaController extends Controller
{
    public function principal()
    {
        $transportes = DB::table('transporte')->select('transporte.*')->get();
        $sucursales = DB::table('sucursal')->select('sucursal.*')->get();
        $personal = DB::table('personal')->select('personal.*')->get();
        $envios = DB::table('envio')->select('envio.*')->get();
        return view('pages.EntregaView.Entrega',['transportes'=>$transportes,'sucursales'=>$sucursales,'personal'=>$personal,'envios'=>$envios]);
    }
    public function store(Request $request)
    {

        $enid = $request->input('enid');
        $enfechaentrega = $request->input('enfechaentrega');
        $enfechacreacion = $request->input('enfechacreacion');
        $endetalles = $request->input('endetalles');

        $traplaca = $request->input('traplaca');
        $percedula = $request->input('percedula');
        $sucid = $request->input('sucid');

        

        
        $data = array('enid'=>$enid,'enfechaentrega'=>$enfechaentrega,'enfechacreacion'=>$enfechacreacion,'endetalles'=>$endetalles,'traplaca'=>$traplaca,'sucid'=>$sucid,'percedula'=>$percedula);
        DB::table('Entrega')->insert($data);
        return redirect('Entregas'); 
    }
    public function show(Request $request)
	{
		$busqueda = $request->input('busqueda');
        $entregas = DB::table('Entrega')->select('Entrega.*')->where('enid',$busqueda)->get(); 
        
        $transportes = DB::table('transporte')->select('transporte.*')->get();
        $sucursales = DB::table('sucursal')->select('sucursal.*')->get();
        $personal = DB::table('personal')->select('personal.*')->get();
        $envios = DB::table('envio')->select('envio.*')->get();


        $entenvs = DB::table('entrega')
        ->join('entregaxenvio', 'entrega.enid', '=', 'entregaxenvio.enid')
        ->select('entregaxenvio.*')
        ->where('entrega.enid', '=', $busqueda)
        ->get();
        return view('pages.EntregaView.EntregaSearch', ['envios'=>$envios,'entregas'=>$entregas,'transportes'=>$transportes,'sucursales'=>$sucursales,'personal'=>$personal,'entenvs'=>$entenvs]);
	}
	
	public function update(Request $request)
	{
        $enid = $request->input('enid');
        $enfechaentrega = $request->input('enfechaentrega');
        $enfechacreacion = $request->input('enfechacreacion');
        $endetalles = $request->input('endetalles');

        
        $traplaca = $request->input('traplaca');
        $percedula = $request->input('percedula');
        $sucid = $request->input('sucid');


        $data = array('enid'=>$enid,'enfechaentrega'=>$enfechaentrega,'enfechacreacion'=>$enfechacreacion,'endetalles'=>$endetalles,'traplaca'=>$traplaca,'sucid'=>$sucid,'percedula'=>$percedula);
        DB::table('entrega')->where('enid','=', $enid)->update($data);
        return redirect('Entregas');
	}
	public function delete(Request $request)
	{
        $enid = $request->input('enid');
        DB::table('entregaxenvio')->where('enid','=', $enid)->delete();
		DB::table('entrega')->where('enid','=', $enid)->delete();
		return redirect('Entregas');
    }
    
    public function storeDetail(Request $request)
    {
        
        $envid = $request->input('envid');
        $ccedula = $request->input('ccedula');
        $envdestino = $request->input('envdestino');
        $envprecio = $request->input('envprecio');

        $enid = $request->input('enid');
     

        
        $data = array('envid'=>$envid,'enid'=>$enid,'ccedula'=>$ccedula,'envdestino'=>$envdestino,'envprecio'=>$envprecio);
        DB::table('entregaxenvio')->insert($data);
        

        $busqueda = $request->input('entrega');
        $entregas = DB::table('entrega')->select('entrega.*')->where('enid',$busqueda)->get(); 
        
        $transportes = DB::table('transporte')->select('transporte.*')->get();
        $sucursales = DB::table('sucursal')->select('sucursal.*')->get();
        $personal = DB::table('personal')->select('personal.*')->get();
        $envios = DB::table('envio')->select('envio.*')->get();


        $entenvs = DB::table('entrega')
        ->join('entregaxenvio', 'entrega.enid', '=', 'entregaxenvio.enid')
        ->select('entregaxenvio.*')
        ->where('entrega.enid', '=', $busqueda)
        ->get();
        return view('pages.EntregaView.EntregaSearch', ['envios'=>$envios,'entregas'=>$entregas,'transportes'=>$transportes,'sucursales'=>$sucursales,'personal'=>$personal,'entenvs'=>$entenvs]);
               
    }
    public function destroy($envid)
    {
        DB::table('entregaxenvio')->where('envid','=', $envid)->delete();
        return redirect('Entregas');

    }
}
