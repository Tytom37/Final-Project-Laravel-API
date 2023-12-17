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
        Schema::create('merchandises', function (Blueprint $table) {
            $table->id();
            $table->string('brand', 90);
            $table->string('description', 90);
            $table->decimal('retail_price',10,2)->unsigned();
            $table->decimal('whole_sale_price',10,2)->unsigned();
            $table->integer('whole_sale_qty')->unsigned();
            $table->integer('qty_stock')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchandises');
    }
};
