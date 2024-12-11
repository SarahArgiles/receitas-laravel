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
        Schema::create('receitas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('ingredientes');
            $table->string('tempo_preparo');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('foto');
            $table->text('modo_preparo');
            $table->text('dicas')->nullable();
            $table->timestamps();
           // $table->unsignedBigInteger('usuario_id');
            $table->foreignId('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receitas', function (Blueprint $table) {
            $table->dropForeign(['usuario_id']); // Remove a chave estrangeira
            $table->dropColumn('usuario_id');   // Remove a coluna user_id
        });
        Schema::dropIfExists('receitas');
    }
};


