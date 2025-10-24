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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('houseId')->unique();
            $table->string('address');
            $table->string('assessorName');
            $table->decimal('roof-type-and-condition', 3, 2);
            $table->decimal('roof-truss', 3, 2);
            $table->decimal('roof-to-wall-connection', 3, 2);
            $table->decimal('wall-type-integrity', 3, 2);
            $table->decimal('wall-to-foundation-connection', 3, 2);
            $table->decimal('openings-windows-and-doors', 3, 2);
            $table->decimal('column-and-beam-system', 3, 2);
            $table->decimal('building-shape-and-plan-configuration', 3, 2);
            $table->decimal('overhand-and-eaves', 3, 2);
            $table->decimal('location-or-environmental-exposure', 3, 7);
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->enum('severity', ['very-low', 'low', 'moderate', 'high', 'very-high']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
