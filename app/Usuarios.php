<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


use \App\Receita as Receita;

class Usuarios extends Authenticatable
{
    public $incrementing = false;

    protected $keyType = 'string';

    protected $primaryKey = 'email';

    public function receita() {
        return $this->hasMany('App\Receita', 'email');
    }
    public function gasto() {
        return $this->hasMany('App\Gasto', 'email');
    }

    public function Lista() {
        return $this->hasMany('App\Lista', 'email');
    }

}
