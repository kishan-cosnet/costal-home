<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('client_review_types', function (Blueprint $table) {
            $table->id('crt_id');
            $table->string('crt_name', 100);
            $table->text('crt_description');
            $table->boolean('crt_status')->default(true); // Status defaults to active
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_review_types');
    }
};
