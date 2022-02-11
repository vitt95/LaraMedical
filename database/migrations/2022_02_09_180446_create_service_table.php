<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\AvailableServicesEnum;

class CreateServiceTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->integer("max")->nullable(false);
            $table->time("duration");
            $table->json("available_days");
            $table->timestamp("delta");
            $table->enum("type", AvailableServicesEnum::TakeAllServices());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
