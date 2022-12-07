<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_en')->nullable();
            $table->string('message')->nullable();
            $table->string('message_en')->nullable();
            $table->bigInteger('user_id')->nullable()->index();
            $table->bigInteger('service_id')->nullable()->index();
            $table->bigInteger('package_id')->nullable()->index();
            $table->bigInteger('category_id')->nullable()->index();
            $table->bigInteger('operation_servic_id')->nullable()->index();  
            $table->bigInteger('customer_review_id')->nullable()->index();  
            $table->text('token')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
