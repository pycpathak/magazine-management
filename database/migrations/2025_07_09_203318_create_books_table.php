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
        
        Schema::create('new_books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('edition')->nullable();
            $table->decimal('price', 10, 2);
            $table->enum('publication_frequency', array_keys(\App\Models\Book::frequencies()));
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
