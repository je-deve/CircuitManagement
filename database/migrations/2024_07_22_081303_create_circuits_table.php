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
        // Create referenced tables first
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->string('service_provider');
            $table->timestamps();
        });

        Schema::create('circuit_types', function (Blueprint $table) {
            $table->id();
            $table->string('circuit_type');
            $table->timestamps();
        });

        Schema::create('entity_types', function (Blueprint $table) {
            $table->id();
            $table->string('entity_type');
            $table->timestamps();
        });

        Schema::create('circuit_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('circuit_status');
            $table->timestamps();
        });

        Schema::create('entity_name', function (Blueprint $table) {
            $table->id();
            $table->string('entity_name');
            $table->timestamps();
        });

        // Create the main table last
        Schema::create('circuits', function (Blueprint $table) {
            $table->id();
            $table->string('circuit_number');
            $table->string('speed');
            $table->unsignedBigInteger('service_provider_id');
            $table->unsignedBigInteger('circuit_type_id');
            $table->unsignedBigInteger('entity_type_id');
            $table->unsignedBigInteger('entity_name_id');
            $table->unsignedBigInteger('circuit_status_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('service_provider_id')->references('id')->on('service_providers')->onDelete('cascade');
            $table->foreign('circuit_type_id')->references('id')->on('circuit_types')->onDelete('cascade');
            $table->foreign('entity_type_id')->references('id')->on('entity_types')->onDelete('cascade');
            $table->foreign('entity_name_id')->references('id')->on('entity_name')->onDelete('cascade');
            $table->foreign('circuit_status_id')->references('id')->on('circuit_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tables in reverse order to respect foreign key constraints
        Schema::dropIfExists('circuits');
        Schema::dropIfExists('entity_name');
        Schema::dropIfExists('circuit_statuses');
        Schema::dropIfExists('entity_types');
        Schema::dropIfExists('circuit_types');
        Schema::dropIfExists('service_providers');
    }
};
