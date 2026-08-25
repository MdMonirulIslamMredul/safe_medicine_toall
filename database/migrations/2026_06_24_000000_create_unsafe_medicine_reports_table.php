<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnsafeMedicineReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unsafe_medicine_reports', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number')->unique();
            $table->string('reporter_name')->nullable();
            $table->string('reporter_phone')->nullable();
            $table->string('medicine_name');
            $table->string('batch_number')->nullable();
            $table->string('pharmacy_name');
            $table->text('pharmacy_address');
            $table->string('district');
            $table->text('description');
            $table->json('images')->nullable();
            $table->string('video')->nullable();
            $table->enum('status', ['pending', 'investigating', 'resolved', 'rejected'])->default('pending');
            $table->boolean('is_blacklisted')->default(false);
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
        Schema::dropIfExists('unsafe_medicine_reports');
    }
}
