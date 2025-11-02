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
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedInteger('sku');
            $table->unsignedInteger('reorder_level')->nullable();
            $table->tinyText('name');
            $table->tinyText('category');
            $table->tinyText('unit');
            $table->tinyText('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('items', ['sku', 'reorder_level', 'name', 'category', 'unit', 'description']);
    }
};
