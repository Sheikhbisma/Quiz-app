<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table='categories';
    protected $fillable = ['category' , 'creator'];
    public function quizzes(){
        return $this->hasMany(addQuiz::class , 'category_id');
    }
}
