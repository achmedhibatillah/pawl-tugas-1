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
        Schema::create('products', function(Blueprint $table){
            $table->integer('product_id')->primary();
            $table->string('product_name', 255)->nullable(false);
            $table->string('product_slug', 355);
            $table->bigInteger('product_price')->nullable(false);
            $table->string('product_photo', 255);
            $table->boolean('product_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('products');
    }
};
