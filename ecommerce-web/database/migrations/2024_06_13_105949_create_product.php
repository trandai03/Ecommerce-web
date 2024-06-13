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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sku');
            $table->string('slug');
            $table->string('name');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('brand_id');
            $table->double('price');
            $table->double('old_price');
            $table->text('description');
            $table->longtext('short_description');
            $table->text('additional_information');
            $table->text('shopping_returns');
            $table->integer('created_by');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
