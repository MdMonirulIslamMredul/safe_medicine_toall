<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicine_id')->constrained('medicines')->onDelete('cascade');
            $table->string('image_path'); // Path to uploaded image file
            $table->enum('type', ['safe', 'unsafe'])->default('safe'); // 'safe' = Authentic, 'unsafe' = Fake / Counterfeit copy
            $table->string('title')->nullable(); // e.g. "Original Blister Pack with 3D Hologram", "Fake Packaging with Font Mismatch"
            $table->text('highlight_points')->nullable(); // Visual marker notes / red flags
            $table->boolean('is_primary')->default(false); // Cover image indicator for that type
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_images');
    }
}
