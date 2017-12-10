<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='usuarios';

    protected $primarykey='idUsuario';

    protected $fillable= ['idUsuario','nombreApellido','email','password','telefono','pago'];

    public function tarea()
    {
    	return $this->hasmany(Tarea::class);
    }
}
