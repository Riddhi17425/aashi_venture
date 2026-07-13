<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            // Each banner belongs to exactly one category. restrictOnDelete()
            // (instead of cascade) so a category can't be permanently deleted
            // while banners still point to it — mirrors the
            // "associated with sub-categories or products" guard already
            // used on Category::forceDestroy().
            $table->foreignId('category_id')
                ->constrained('categories')
                ->restrictOnDelete();

            $table->string('title');
            $table->string('short_note', 500)->nullable();
            $table->longText('description')->nullable();

            $table->string('mobile_image')->nullable();
            $table->string('mobile_image_alt')->nullable();

            $table->string('desktop_image')->nullable();
            $table->string('desktop_image_alt')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
