<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mcqs_records extends Model
{
    //
    public function scopeWithMcqs($query){
        return $query->join('mcqs','mcqs_records.mcq_id','=','mcqs.id')
        ->select('mcqs.*' , 'mcqs_records.*')
        ;
    }
}
