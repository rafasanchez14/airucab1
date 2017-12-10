<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table='lugar';

    protected $primarykey='id_lugar';

    protected $fillable= ['id_lugar','nombre_lugar','tipo_lugar','lugar_per'];

    
}