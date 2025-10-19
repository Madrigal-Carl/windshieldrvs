<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'houseId',
        'address',
        'assessorName',
        'roof-type-and-condition',
        'roof-truss',
        'roof-to-wall-connection',
        'wall-type-integrity',
        'wall-to-foundation-connection',
        'openings-windows-and-doors',
        'column-and-beam-system',
        'building-shape-and-plan-configuration',
        'overhand-and-eaves',
        'location-or-environmental-exposure',
        'latitude',
        'longitude',
        'severity',
    ];
}
