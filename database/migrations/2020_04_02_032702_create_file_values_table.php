<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('file_option_id');
            $table->unsignedBigInteger('file_option_value_id');
            $table->unsignedBigInteger('file_id');
            $table->string('extra')->nullable();
            $table->longText('description');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('file_option_id')->references('id')->on('file_options')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('file_option_value_id')->references('id')->on('file_option_values')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_values');
    }
}
