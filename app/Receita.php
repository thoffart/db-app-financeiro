<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    public function usuarios() {
        return $this->belongTo('App\User');
    }
}
