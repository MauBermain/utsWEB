<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                  ->constrained('categories')   // foreign key ke categories.id
                  ->restrictOnDelete();         // kategori tidak bisa dihapus kalau masih dipakai
            $table->string('name');
            $table->decimal('price', 12, 2);
            $table->integer('stock');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};