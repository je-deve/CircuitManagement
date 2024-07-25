<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the report_types table
        Schema::create('report_types', function (Blueprint $table) {
            $table->id();
            $table->string('report_type');
            $table->timestamps();
        });



        // Create the events table
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamp('report_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('completion_date')->nullable();
            $table->text('report_detail');
            $table->unsignedBigInteger('circuit_id');
            $table->unsignedBigInteger('report_type_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('circuit_status_id')->nullable(); // Add the circuit_status_id column
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('circuit_id')->references('id')->on('circuits')->onDelete('cascade');
            $table->foreign('report_type_id')->references('id')->on('report_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Adjusted to set null on delete
            $table->foreign('circuit_status_id')->references('id')->on('circuit_statuses')->onDelete('set null'); // Add foreign key constraint for circuit_status_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('report_types');
    }
};
