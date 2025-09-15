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
        Schema::create('staff_categories', function (Blueprint $table) {
            $table->integer('cat_id');
            $table->string('name',300);
            $table->longText('description')->nullable();
            $table->string('status')->default('Active');
            $table->integer('created_by');
            $table->string('created_on')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('updated_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_categories');
    }
};
