<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->string('section_key')->unique();
            $table->string('label')->nullable();
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('lead')->nullable();
            $table->text('intro')->nullable();
            $table->string('image')->nullable();
            $table->string('button_text')->nullable();
            $table->timestamps();
        });

        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('badge');
            $table->string('image')->nullable();
            $table->json('tags')->nullable();
            $table->string('pricing_text')->default('Contact us for pricing');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('gallery_slides', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('caption');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('pricing_text')->default('Contact us for pricing');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('content_list_items', function (Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->string('section');
            $table->string('type')->default('bullet');
            $table->text('content');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['page', 'section']);
        });

        Schema::create('service_audience_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('service_audience_cards');
        Schema::dropIfExists('content_list_items');
        Schema::dropIfExists('room_types');
        Schema::dropIfExists('gallery_slides');
        Schema::dropIfExists('properties');
        Schema::dropIfExists('page_sections');
    }
};
