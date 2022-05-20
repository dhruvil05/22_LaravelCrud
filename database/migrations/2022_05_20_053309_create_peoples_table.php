<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->id('p_id');
            $table->string('p_name', 100);
            $table->enum('p_gender',["M", "F", "O"])->nullable();
            $table->date('p_dob')->nullable();
            $table->string('p_favsport', 50);
            $table->string('p_country',50);
            $table->string('p_like',50)->nullable();
            $table->text('p_address');
            $table->string('p_email', 255);
            $table->string('p_file', 255)->nullable();
            $table->string('p_password');
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
        Schema::dropIfExists('peoples');
    }
}
