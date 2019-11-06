<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('foods',function(Blueprint $table){
            $table->string('shopName')->nullable()->change();
            $table->string('food')->nullable()->change();
            $table->string('location')->nullable()->change();
            $table->string('photo')->nullable()->change();
            $table->string('comment')->nullable()->change();
            $table->string('genre')->nullable()->change();
            $table->dateTime('date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
