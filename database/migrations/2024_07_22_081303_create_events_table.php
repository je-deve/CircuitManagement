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
        // Create the report_types table first
        Schema::create('report_types', function (Blueprint $table) {
            $table->id();
            $table->string('report_type');
            $table->timestamps();
        });

        // Create the events table after report_types
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->date('report_date');
            $table->date('completion_date')->nullable();
            $table->text('report_detail');
            $table->unsignedBigInteger('circuit_id');
            $table->unsignedBigInteger('report_type_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('circuit_id')->references('id')->on('circuits')->onDelete('cascade');
            $table->foreign('report_type_id')->references('id')->on('report_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tables in reverse order to respect foreign key constraints
        Schema::dropIfExists('events');
        Schema::dropIfExists('report_types');
    }
};
