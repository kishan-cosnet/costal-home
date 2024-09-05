<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('leave_types', function (Blueprint $table) {
            $table->id('lt_id');
            $table->string('lt_name', 100);
            $table->text('lt_description');
            $table->boolean('status')->default(true); // Status defaults to active
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leave_types');
    }
};
