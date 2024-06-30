<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    // public function user(){
    //     $usuario=User::find($this->user_id);
    //     return $usuario;
    // }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}


