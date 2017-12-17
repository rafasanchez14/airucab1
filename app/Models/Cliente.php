<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';

    protected $primarykey='id';

    protected $fillable= ['nombre_cliente','montoac','fechaini','dni','apellido','rif','id_lugar'];

    
}
