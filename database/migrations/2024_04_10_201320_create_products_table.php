<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_type_id')->constrained('product_types', 'id')->cascadeOnDelete();
            $table->foreignId('product_category_id')->constrained('product_categories', 'id')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            // $table->foreignId('location_id')->constrained('locations', 'id')->cascadeOnDelete();
            $table->foreignId('governorate_id')->constrained('locations', 'id')->cascadeOnDelete();
            $table->foreignId('city_id')->constrained('locations', 'id')->cascadeOnDelete();
            $table->foreignId('state_id')->constrained('locations', 'id')->cascadeOnDelete();
            $table->string('address');
            $table->json('properties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};