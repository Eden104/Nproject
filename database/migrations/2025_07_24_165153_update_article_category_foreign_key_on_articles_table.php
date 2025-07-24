<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Supprimer la contrainte existante
            $table->dropForeign(['article_category_id']);

            // Recréer avec onDelete('cascade')
            $table->foreign('article_category_id')
                  ->references('id')
                  ->on('article_categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['article_category_id']);

            // Revenir à une contrainte sans cascade
            $table->foreign('article_category_id')
                  ->references('id')
                  ->on('article_categories');
        });
    }
};
