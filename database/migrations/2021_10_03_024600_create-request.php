<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table){
            $table->id();
            $table->longText('name_request');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('student_number');
            $table->longText('purpose');
            $table->string('qty_copy');
            $table->string('price')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
