<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->bigInteger("id_doctor")->nullable(false)->default(0);
            $table->bigInteger("id_patient")->nullable(false)->default(0);
            $table->text("link_pdf");
            $table->text("note");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
