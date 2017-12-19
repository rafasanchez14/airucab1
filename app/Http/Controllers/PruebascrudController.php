<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Lugar;
use DB;
use Session;

class PruebascrudController extends Controller
{
public function index(){
  $pruebas=DB::select("SELECT cod_prueba,nombre_prueb,descrip_prue FROM Prueba order by nombre_prueb");
  return view('portal/airucab-pruebascrud',compact('pruebas'));
}
public function insertar_prueba(Request $request)
  {
    $nombre=$request->nombre_prueb;
    $desc=$request->desc;
    $idp=DB::select("SELECT cod_prueba from Prueba
          order by cod_prueba desc limit 1");

          foreach ($idp as $key)
          {
            $re=$key->cod_prueba;
          }
          $re=intval($re);
          $re=$re+1;

    DB::insert('INSERT INTO prueba(
            cod_prueba, nombre_prueb, descrip_prue)
    VALUES (?, ?, ?)',[$re,$nombre,$desc]);

                    Session::flash('save','Agregado correctamente');
                    return redirect('/pruebascrud');

    }

    public function update(Request $request, $id)
    {
        DB:: update('UPDATE prueba
         SET  nombre_prueb=?, descrip_prue=? WHERE cod_prueba=?',array($request->nombre_prueb,$request->descrip_prue,$id));
             Session::flash('save','Prueba  Modificado correctamente');
            return redirect('/pruebascrud');
    }

    public function edit($id)
    {
      $pruebas=DB::select("SELECT cod_prueba,nombre_prueb,descrip_prue FROM Prueba order by nombre_prueb");
      $pru=DB::selectOne("SELECT cod_prueba,nombre_prueb,descrip_prue FROM Prueba where cod_prueba=$id order by nombre_prueb");
      return view('portal/airucab-pruebascrudEdit',compact('pruebas','pru'));

    }

    public function buscarMP(Request $request){

       $clavemp = $request->clave;
       $pruebas=DB::selec("SELECT cod_prueba,nombre_prueb,descrip_prue FROM Prueba where nombre_prueb like'%$clavemp%' order by nombre_prueb");
       if(count($pruebas) > 0)
        return view('portal/airucab-clientes',compact('pruebas'));
        else{
              Session::flash('delete','No se encontraron resultados');
      return redirect('/pruebascrud');
        }

      }
    public function destroy($id)
    {
    try {
        $data1=array($id);
          DB::DELETE("DELETE FROM prueba WHERE cod_prueba=?",$data1);

      Session::flash('save','Prueba Material eliminado correctamente');
      return redirect('/pruebas');

        }catch (\Illuminate\Database\QueryException $e){
            Session::flash('delete','No es posible eliminar esta Prueba Material');
      return redirect('/pruebas');
        }

}

}
