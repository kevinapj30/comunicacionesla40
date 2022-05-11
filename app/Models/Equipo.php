<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    
    protected $table ='equipos';
    protected $fillable=['id','tipo_equipo_id', 'cliente_id','Marca','Modelo','CodigoSerial','IMEI','Caracteristicas'];

    public function tipoEquipo()
    {
        return $this->belongsTo(TipoDeEquipo::class, 'tipo_equipo_id');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    //One to One
    public function oneDiagnostico()
    {
        return $this->hasOne(Diagnostico::class);
    }

}
