<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // public function user(){
    //     $usuario=User::find($this->user_id);
    //     return $usuario;
    // }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}


