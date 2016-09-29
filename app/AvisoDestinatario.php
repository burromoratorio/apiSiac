<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvisoDestinatario extends Model
{
    protected $table = 'avisos_destinatarios';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected function destinatario() {
        return $this->belongsTo('App\Destinatario', 'destinatario_id');
    }
}
