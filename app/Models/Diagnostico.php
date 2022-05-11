<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;
    protected $table = 'diagnosticos';
    protected $fillable = ['id','tecnico_id','equipo_id','FechadeLlegada','Diagnostico','Procedimientos','Repuestos','PersonalEncargado','FechadeSalida'];

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'tecnico_id');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }

}
