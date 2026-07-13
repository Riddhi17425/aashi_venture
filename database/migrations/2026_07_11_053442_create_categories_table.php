<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category_url')->unique();
            $table->string('short_note', 500)->nullable();
            $table->string('icon')->nullable();

            $table->longText('description')->nullable();
            $table->string('detail_page_title')->nullable();
            $table->string('detail_page_shortnote', 500)->nullable();

            $table->string('listing_image')->nullable();
            $table->string('listing_image_alt')->nullable();
            $table->string('detail_image')->nullable();
            $table->string('detail_image_alt')->nullable();
            $table->string('brochure_pdf')->nullable();

            $table->json('stats')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_description', 500)->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
