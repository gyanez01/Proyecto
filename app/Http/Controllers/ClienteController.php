<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ClienteModel;
class ClienteController extends Controller
{
    function principal()
	{
		return view('pages.ClienteView.Clientes');
	}

	public function store(Request $request)
    {
        ClienteModel::create($request->all());
        return redirect('Clientes')->with('success', 'Se añadio correctamente');
	}
	public function show(Request $request)
	{
		$cedula = $request->input('busqueda');
		$clientes = ClienteModel::where('ccedula',$cedula)->get();
		return view('pages.ClienteView.ClientesSearch', ['clientes'=>$clientes]);
	}

	public function update(Request $request)
	{
		$ccedula = $request->input('ccedula');
        $cnombre = $request->input('cnombre');
        $cdireccion = $request->input('cdireccion');
        $ctelefono = $request->input('ctelefono');
        $cfechanacimiento = $request->input('cfechanacimiento');
		$ccorreo = $request->input('ccorreo');
		$cliente = array('ccedula'=>$ccedula,'cnombre'=>$cnombre,'cdireccion'=>$cdireccion,'ctelefono'=>$ctelefono,'cfechanacimiento'=>$cfechanacimiento,'ccorreo'=>$ccorreo);
		ClienteModel::where('ccedula','=', $ccedula)->update($cliente);
		return redirect('Clientes')->with('success', 'Se modifico correctamente');;
        
	}

	public function delete(Request $request)
	{
		$ccedula = $request->input('ccedula');
		ClienteModel::where('ccedula','=', $ccedula)->delete();
		return redirect('Clientes')->with('success', 'Se elimino correctamente');;
        
	}
}
