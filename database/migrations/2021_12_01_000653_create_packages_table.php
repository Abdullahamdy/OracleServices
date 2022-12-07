<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('price')->nullable();
            $table->bigInteger('type_id')->nullable();
            $table->float('discount')->nullable();
            $table->float('tax')->nullable();
            $table->float('price_after')->nullable();
            $table->string('status_id')->nullable();
            $table->string('period')->nullable();
            $table->text('description')->nullable();
            $table->text('description_en')->nullable();
            $table->bigInteger('service_id')->nullable();
            $table->text('path')->nullable();
            $table->bigInteger('days')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
