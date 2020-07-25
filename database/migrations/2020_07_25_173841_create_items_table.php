<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('items');
        Schema::create('items', function (Blueprint $table) {
            $table->increments('_id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
            $table->string('name', 50);
            $table->string('description', 250);
            $table->float('price', 8, 2);
            $table->string('image');
            $table->timestamp('created_at')->nullable();
            // $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        });
        
        // Schema::table('items', function($table) {
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
