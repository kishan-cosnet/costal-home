<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('public_holidays', function (Blueprint $table) {
            $table->id('hld_id');
            $table->string('hld_name', 100);
            $table->date('hld_date');
            $table->text('hld_description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('public_holidays');
    }
};
