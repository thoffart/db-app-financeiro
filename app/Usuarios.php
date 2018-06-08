<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \App\Receita as Receita;

class Usuarios extends Model
{
    public $incrementing = false;

    protected $keyType = 'string';

    protected $primaryKey = 'email';

    public function receita() {
        return $this->hasOne('App\Receita', 'user_email');
    }
}
