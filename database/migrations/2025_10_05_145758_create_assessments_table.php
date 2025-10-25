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
            $table->string('house_id')->unique();
            $table->string('address');
            $table->string('assessor_name')->nullable();
            $table->decimal('roof_type_and_condition', 4, 2);
            $table->decimal('roof_truss', 4, 2);
            $table->decimal('roof_to_wall_connection', 4, 2);
            $table->decimal('wall_type_integrity', 4, 2);
            $table->decimal('wall_to_foundation_connection', 4, 2);
            $table->decimal('openings_windows_and_doors', 4, 2);
            $table->decimal('column_and_beam_system', 4, 2);
            $table->decimal('building_shape_and_plan_configuration', 4, 2);
            $table->decimal('overhand_and_eaves', 4, 2);
            $table->decimal('location_or_environmental_exposure', 4, 2);
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->enum('severity', ['very-low', 'low', 'medium', 'high', 'very-high']);
            $table->string('path')->nullable();
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
