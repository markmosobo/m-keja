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
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            $table->unsignedBigInteger('landlord_id');       // FK → clients.id
            $table->unsignedBigInteger('agent_id');       // FK → clients.id
            $table->foreign('landlord_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign(columns: 'agent_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title', 20)->nullable(); // phones rarely exceed 20 chars
            $table->longText('description')->nullable(); // phones rarely exceed 20 chars
            $table->enum('type', [
                'apartment', 'house', 'bedsitter', 'studio', 'office', 'land'
            ])->default('pending');
            $table->string('location', 20)->nullable(); // phones rarely exceed 20 chars
            $table->string('coordinates', 20)->nullable(); // phones rarely exceed 20 chars
            $table->decimal('rent_amount', 20)->nullable(); // phones rarely exceed 20 chars
            $table->enum('status', ['available', 'occupied', 'maintenance'])->default('user'); // controlled roles            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
