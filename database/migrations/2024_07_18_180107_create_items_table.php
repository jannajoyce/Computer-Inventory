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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('brand');
            $table->string('property_number');
            $table->string('unit');
            $table->unsignedBigInteger('unit_value');
            $table->unsignedBigInteger('quantity');
            $table->string('location');
            $table->string('condition');
            $table->string('remarks');
            $table->string('po_number');
            $table->string('dealer');
            $table->dateTime('date_acquired');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
