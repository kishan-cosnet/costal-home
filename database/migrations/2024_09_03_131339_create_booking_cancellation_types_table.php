<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('booking_cancellation_types', function (Blueprint $table) {
            $table->id('booking_id');
            $table->string('booking_name', 100);
            $table->text('booking_description');
            $table->boolean('booking_status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('booking_cancellation_types');
    }
};
