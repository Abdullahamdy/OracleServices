<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            // $table->string('name_en')->nullable();
            $table->text('short_description')->nullable();
            // $table->text('short_description_en')->nullable();
            $table->text('full_description')->nullable();
            // $table->text('full_description_en')->nullable();
            $table->text('path')->nullable();
            $table->text('token')->nullable();
            $table->string('role_id')->nullable();
            $table->date('begin')->nullable();
            $table->date('end')->nullable();
            $table->string('status')->default(0);
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('services');
    }
}
