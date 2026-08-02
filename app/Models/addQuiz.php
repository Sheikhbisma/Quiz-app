<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addQuiz extends Model
{
    //
    protected $table='add_quiz';
    protected $fillable = ['quiz_name' , 'category_id'];
    public function Categories(){
        return $this->belongsTo(Categories::class);
    }
    public function mcq(){
        return $this->hasMany(Mcq::class , 'quiz_id');
    }
    public function category(){
        return $this->belongsTo(Categories::class , 'category_id');
    }
   
}
