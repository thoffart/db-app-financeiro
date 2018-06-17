<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


use \App\Receita as Receita;

class Usuarios extends Authenticatable
{
    protected $primaryKey  = 'email';

    public $incrementing = false;

    protected $keyType = 'string';

    
 
    //protected $table = 'customusers';

    public function receita() {
        return $this->hasMany('App\Receita', 'email');
    }
    public function gasto() {
        return $this->hasMany('App\Gasto', 'email');
    }

    public function Lista() {
        return $this->hasMany('App\Lista', 'email');
    }

   /*  protected $fillable = [
        'nome','email', 'password', 'nascimento', 'ccredito'. 'cdebito', 'boleto'
    ]; */

    /* protected $hidden = [
        'password', 'remember_token',
    ];
 
 
    public function getAuthPassword()
    {
      return $this->password;
    }
 */
}
