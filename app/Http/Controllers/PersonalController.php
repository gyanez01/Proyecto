<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonalModel;


class PersonalController extends Controller
{
    function principal()
	{
		return view('pages.PersonalView.Personal');
	}
	public function store(Request $request)
    {
        PersonalModel::create($request->all());
        return redirect('Personal')->with('success', 'Se añadio correctamente');
	}
	public function show(Request $request)
	{
		$percedula = $request->input('busqueda');
		$personal = PersonalModel::where('percedula',$percedula)->get();	
		return view('pages.PersonalView.PersonalSearch', ['personal'=>$personal]);
	}

	public function update(Request $request)
	{
		
		$percedula = $request->input('percedula');
        $pernombre = $request->input('pernombre');
        $perapellido = $request->input('perapellido');
        $percargo = $request->input('percargo');
        $perfechanacimiento = $request->input('perfechanacimiento');
		$personal = array('percedula'=>$percedula,'pernombre'=>$pernombre,'perapellido'=>$perapellido,'percargo'=>$percargo,'percargo'=>$perfechanacimiento);
		PersonalModel::where('percedula','=', $percedula)->update($personal);
		return redirect('Personal')->with('success', 'Se modifico correctamente');
	}

	public function delete(Request $request)
	{
		$percedula = $request->input('percedula');
		PersonalModel::where('percedula','=', $percedula)->delete();
		return redirect('Personal')->with('success', 'Se elimino correctamente');   
	}
}
