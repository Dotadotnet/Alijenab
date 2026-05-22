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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->string("nameEn")->unique();
            $table->json("images");
            $table->string("thumbnail");
            $table->integer("price");
            $table->integer("category");
            $table->longText("caption")->nullable();
            $table->string("summery")->nullable();
            $table->boolean("isAvailable")->default(true);
            $table->string("off", 3)->nullable();
            $table->timestamps();
        }); 
    }
   // numerical or weight
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
