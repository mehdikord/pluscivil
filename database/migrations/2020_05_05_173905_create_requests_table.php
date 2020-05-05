<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('supporter_id')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->string('title_form')->nullable();
            $table->longText('description_form')->nullable();
            $table->string('file_form')->nullable();
            $table->boolean('is_accepted')->default(0);
            $table->string('amount')->nullable();
            $table->string('price')->nullable();
            $table->string('time_to_do')->nullable();
            $table->longText('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('supporter_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
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
