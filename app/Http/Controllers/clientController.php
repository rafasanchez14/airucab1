<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;

class clientController extends Controller
{

    public function store(Request $request)
    {
        $name=$request->input('nombre');
        $apellido=$request->input('apellido');
        $dni=$request->input('id');
        $rif=$request->input('rif');
        $place=$request->input('parroquia');
        $amount=$request->input('monto');
        $code=$request->input('cod');
        $phone=$request->input('phone');
        $page=$request->input('web');
        $fecha=$request->input('date');

        DB::insert('INSERT into Cliente
        (nombre_cliente,montoac,fechaini,dni,apellido,rif,id_lugar) 
        values (?,?,?,?,?,?,?)', [$name,$amount,$fecha,$dni,$apellido,$rif,$place]);
        
        // esto me trae el ultimo que inserte//
        $id=DB::selectOne("SELECT max(id_cliente) as last_id from Cliente;");
        // cuenta el numero de inputs 
        $correo=count($request->input('correo'));
        // lo q recibe
        $mail=$request->input('correo');
        
            
        
           
           
                 for($i=0;$i<$correo;$i++) { 
        
                   DB::insert('INSERT INTO Correo
                   (mail,id_cliente)
                   VALUES (?,?)', [$mail[$i],$id->last_id]);
       
  
         }
    
      
    
     }



  

}