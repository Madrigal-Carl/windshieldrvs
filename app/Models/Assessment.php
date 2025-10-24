<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'house_id',
        'address',
        'assessor_name',
        'roof_type_and_condition',
        'roof_truss',
        'roof_to_wall_connection',
        'wall_type_integrity',
        'wall_to_foundation_connection',
        'openings_windows_and_doors',
        'column_and_beam_system',
        'building_shape_and_plan_configuration',
        'overhand_and_eaves',
        'location_or_environmental_exposure',
        'latitude',
        'longitude',
        'severity',
        'path',
    ];
}
