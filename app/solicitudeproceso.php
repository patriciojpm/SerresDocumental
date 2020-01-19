<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitudeproceso extends Model
{
    protected $fillable = [
        'id','estructura_id','usuconformulario_id','mes','ano','contratados','desvinculados','otrascausas','pivote','totalvigentes','estado','user_id','observaciones','inspector_id','numerocertificado','rectCert','contdocutrab','contdocuempr','evalfina','otro','otroobser','fechaEnvio','rutSub','nomSub','dirSub','comSub','telSub','identificacion',
    ];

    public function empresa(){
        return $this->belongsTo(empresa::class);
    }

    public function estructura(){
        return $this->belongsTo(estructura::class);
    }

    public function usuconformulario(){
        return $this->belongsTo(usuconformulario::class);
    }

    // public function seguimiento(){
    //     return $this->belongsTo(seguimiento::class);
    // }
    public function seguimiento(){
        return $this->hasMany(seguimiento::class);
    }

    public function user(){
        return $this->belongsTo('App\User','inspector_id','id');
    }

}
