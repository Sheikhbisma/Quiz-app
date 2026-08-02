<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reset_Password extends Model
{
    //
    protected $table='reset_password';
 protected $fillable = ['email','token'];
}
