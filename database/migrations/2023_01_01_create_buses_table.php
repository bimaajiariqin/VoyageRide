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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bus_type');
            $table->integer('seat_capacity');
            $table->string('bus_number');
            $table->string('model');
            $table->string('logo_url')->nullable();
        
            // Diubah dari string ke foreign key
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('destination_id');
        
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->decimal('price', 10, 2);
            $table->boolean('has_luggage')->default(false);
            $table->boolean('has_light')->default(false);
            $table->boolean('has_ac')->default(false);
            $table->boolean('has_drink')->default(false);
            $table->boolean('has_wifi')->default(false);
            $table->boolean('has_usb')->default(false);
            $table->boolean('has_cctv')->default(false);
        
            // Tambahkan foreign key constraint
            $table->foreign('origin_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('cities')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
