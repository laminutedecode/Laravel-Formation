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

        // Schema::create('categories', function(Blueprint $table){
        //     $table->id();
        //     $table->string('name');
        //     $table->timestamps();
        // });
        // Schema::create('articles', function(Blueprint $table){
        //     $table->id();
        //     $table->string('title');
        //     $table->longText('description');
        //     $table->string('image');
        //     $table->unsignedBigInteger('category_id');
        //     $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        //     $table->unsignedBigInteger('author_id');
        //     $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->timestamps();
        // });
   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
  
    }
};
