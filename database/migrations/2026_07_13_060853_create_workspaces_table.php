<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workspaces', function (Blueprint $table) {
            $table->id();

            // restrictOnDelete() so a tab (workspace_category) can't be
            // deleted while images still belong to it — same guard used
            // between banners and categories.
            $table->foreignId('workspace_category_id')
                ->constrained('workspace_categories')
                ->restrictOnDelete();

            $table->string('image');
            $table->string('image_alt')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workspaces');
    }
};
