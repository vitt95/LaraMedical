<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->string("name");
            $table->string("lastname");
            $table->string("phone", 25);
            $table->string("mobile_phone", 25);
            $table->date("birth");
            $table->string("address", 255);
            $table->string("email", 255)->unique();
            $table->text("note");
            $table->string("fiscal_code", 20);
            $table->string("nation", 100);
            $table->enum("sex", ["male", "female", "other"]);
            $table->string("heigth", 5);
            $table->string("weigth", 5);
            $table->enum("rh", ["positive", "negative"]);
            $table->enum("blood_group", ["A","B","0","AB"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
