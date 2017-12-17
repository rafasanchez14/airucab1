<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use DB;

class materialController extends Controller
{

     public function index() {

     $material=DB::select(DB::raw( "SELECT m.cod_material as cod, m.nombre as nombre,m.descrip as description
                                    from Material m
                                    group by cod,nombre,description
                                    order by cod Asc;"));

     return view ('portal/airucab-crudMaterial',compact('material'));


    }


      public function store(Request $request){

      $name=$request->input('nombre');
      $descrip=$request->input('descripcion');

      DB::insert('INSERT into Material
      (nombre,descrip)
      values (?,?)', [$name,$descrip]);

      return redirect()->route('material.index')->with('success','material agregado exitosamente');



    }

    public function show($id)
    {
        //
    }


    public function edit($id) {

       $data1=$id;
       $material=DB::selectOne("SELECT * FROM Material WHERE cod_material=$data1");
       return view('portal/airucab-editMaterial',compact('material'));

    }


    public function update(Request $request,$id) {

    $name=$request->input('nombre');
    $descrip=$request->input('descripcion');

    DB::update( 'UPDATE Material
                     SET nombre=?,
                         descrip=?
                         WHERE cod_material =?',[$name,$descrip,$id]);

    return redirect()->route('material.index')->with('success','material modificado exitosamente');



    }

    public function destroy($idMaterial) {

       $data1=array($idMaterial);


       DB::statement("DELETE
                      from Material
                      where cod_material=?",$data1);

       return redirect()->route('material.index')->with('success','material eliminado exitosamente');

    }


}
