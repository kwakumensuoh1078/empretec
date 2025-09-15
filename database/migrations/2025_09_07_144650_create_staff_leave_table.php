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
        Schema::create('staff_leave', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('leave_type')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('days_used')->nullable();
            $table->date('resumption_date')->nullable();
            $table->unsignedBigInteger('caretaker_id')->nullable();
            $table->string('emergency_number')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('relationship')->nullable();
            $table->integer('leave_entitlement')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('s_status')->nullable();
              $table->string('remarks')->nullable();
            $table->string('replace')->nullable();
            $table->string('hod_reason')->nullable();
            $table->date('hod_date')->nullable();
            $table->date('hr_date')->nullable();
            $table->string('hr_reason')->nullable();
            $table->string('rv_reason')->nullable();
            $table->date('rv_date')->nullable();
            $table->unsignedBigInteger('sup_id')->nullable();
            $table->date('ahr_date')->nullable();
            $table->string('hr_seen')->nullable();
            $table->integer('approved_days')->default(0)->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_leave');
    }
};
