<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
{

    public function index()
    {
        $categoria['categoria'] = Categoria::paginate(5);
        return view("categoria.index" , $categoria);
    }


    public function create()
    {
        $categorias = Categoria::all();
        return view("categoria.create")->with(["categorias" => $categorias]);
        Session::flash('alert-Concluido', 'Se ha creado el registro con exitoi');
    }


    public function store(Request $request)
    {
        $categoria = $request->except('_token');
        Categoria::insert($categoria);
        return redirect() -> route("categoria.index");
        Session::flash('alert-Concluido', 'Se ha creado el registro con exitoi');
    }


    public function search(Request $request)
    {
        $data = $request->input('search');
        $query = Categoria::select()
            ->where('name','like',"%$data%")
            ->orwhere('description','like',"%$data%")
            ->get();

        return view("categoria.index")->with(["categoria" => $query]);
    }

    public function show(Categoria $categoria)
    {
        //
    }


    public function edit($id)
    {
        $data = Categoria::findOrFail($id);
        return view("categoria.edit")->with(["categoria" => $data]);
        Session::flash('alert-Concluido', 'Se ha EDITADO el registro con exitoi');
    }


    public function update(Request $request, $id)
    {
        $data = $request -> except('_token','_method');
        Categoria::where('id','=', $id)->update($data);
        return redirect()->route("categoria.index");
        Session::flash('alert-Concluido', 'Se ha EDITADO el registro con exitoi');
    }


    public function destroy($id)
    {
        Categoria::destroy($id);
        return redirect() -> route("categoria.index");
        Session::flash('alert-Concluido', 'Se ha eliminado el registro con exitoi');
    }
}
