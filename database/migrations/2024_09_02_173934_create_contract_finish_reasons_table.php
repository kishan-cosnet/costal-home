<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contract_finish_reasons', function (Blueprint $table) {
            $table->id('reason_id');
            $table->string('reason_name', 100);
            $table->text('reason_description');
            $table->timestamps(); // This will add `created_at` and `updated_at` fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_finish_reasons');
    }
};
