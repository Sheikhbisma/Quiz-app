<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mcqs', function (Blueprint $table) {
            $table->id();
              $table->string('mcqs' , 500);
              $table->string('Option_A' , 500);
              $table->string('Option_B' , 500);
              $table->string('Option_C' , 500);
              $table->string('Option_D' , 500);
              $table->string('Correct_Answer' , 10);
             
              $table->foreignId('admin_id')->constrained('admin_login' , 'id');
              $table->foreignId('category_id')->constrained('categories' , 'id');
              $table->foreignId('quiz_id')->constrained('add_quiz' , 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcqs');
    }
};
