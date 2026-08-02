<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Records extends Model
{
    //
    protected $table ='records';
    protected $fillable = ['user_id' , 'quiz_id'];
     public function scopeWithQuiz($query){
        return $query->join('add_quiz','records.quiz_id','=','add_quiz.id')
        ->select('add_quiz.quiz_name' , 'records.*');

        ;
    }
}
