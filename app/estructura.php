<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class estructura extends Model
{
    protected $fillable = [
        'empresa_id', 'contrato', 'fechaInicio', 'activo', 'pivote','fechaCierre','User_id','proyecto_id',
    ];

    public function empresa(){
        return $this->belongsTo(empresa::class);
    }

    public function proyecto(){
        return $this->belongsTo(proyecto::class);
    }
}
