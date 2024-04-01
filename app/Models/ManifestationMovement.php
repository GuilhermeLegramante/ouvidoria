<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManifestationMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'manifestation_id',
        'previous_manifestation_status_id',
        'current_manifestation_status_id',
        'description',
    ];
}
