<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('category');
        Schema::create('category', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->integer("parent_id")->unsigned();
            $table->foreign('parent_id')->references('id')->on('category');
            $table->timestamps(); 
            // $table->foreignId('parent_id')->nullable()->constrained();
        });
        
        // Schema::table('category', function($table){
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
