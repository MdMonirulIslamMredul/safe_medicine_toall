<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Brand Name e.g. Napa Extra, Seclo 20
            $table->string('generic_name'); // e.g. Paracetamol + Caffeine, Omeprazole
            $table->string('manufacturer'); // e.g. Beximco Pharmaceuticals Ltd., Square Pharmaceuticals Ltd.
            $table->string('dosage_form')->default('Tablet'); // Tablet, Capsule, Syrup, Suspension, Injection, Eye Drop, etc.
            $table->string('strength')->nullable(); // e.g. 500 mg + 65 mg, 20 mg, 10 mg
            $table->string('dar_number')->nullable(); // Drug Administration Registration No e.g. DAR 025-0145-022
            $table->decimal('price', 8, 2)->nullable(); // MRP in BDT
            $table->string('therapeutic_class')->nullable(); // e.g. Analgesic & Antipyretic, PPI, Antibiotic
            $table->enum('status', ['safe', 'unsafe', 'warning'])->default('safe'); // 'safe' = Authentic, 'unsafe' = Fake/Counterfeit alert, 'warning' = Recalled/Substandard
            $table->text('safety_verdict')->nullable(); // High-level verdict summary
            $table->text('indications')->nullable(); // Uses & indications
            $table->text('dosage_guidelines')->nullable(); // Administration & dosage
            $table->text('side_effects')->nullable(); // Precautions & side effects
            $table->string('storage_condition')->nullable(); // e.g. Store below 30°C in a cool and dry place
            $table->text('authentic_features')->nullable(); // Key genuine packaging checkpoints
            $table->text('fake_indicators')->nullable(); // Telltale red flags of fake copies
            $table->string('affected_batches')->nullable(); // Specific flagged/counterfeit batch numbers if any
            $table->boolean('is_featured')->default(false);
            $table->unsignedBigInteger('view_count')->default(0);
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
        Schema::dropIfExists('medicines');
    }
}
