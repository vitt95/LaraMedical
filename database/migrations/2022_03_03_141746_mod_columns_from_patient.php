<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModColumnsFromPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('nation');
            $table->string('region', 50);
            $table->string('province', 50);
            $table->string('city', 60);
            $table->string('zip', 8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('nation', 60);
            $table->dropColumn('region');
            $table->dropColumn('province');
            $table->dropColumn('city');
            $table->dropColumn('zip');
        });
    }
}
