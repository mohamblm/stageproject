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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etablissement_id')->constrained('etablissements')->onDelete('cascade');
            $table->foreignId('domaine_id')->constrained('domaines')->onDelete('cascade');
            $table->string('nom');
            $table->string('image');
            $table->text('description')->nullable();
            $table->json('sub_titles')->nullable();
            $table->json('for_whos')->nullable();
            $table->json('requirements')->nullable();
            $table->json('includes')->nullable();
            $table->json('languages')->nullable();
            $table->boolean('trend')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
