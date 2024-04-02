<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ManifestationMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'manifestation_id',
        'previous_manifestation_status_id',
        'current_manifestation_status_id',
        'description',
    ];

    public function manifestation(): BelongsTo
    {
        return $this->belongsTo(Manifestation::class);
    }

    public function previousStatus(): HasOne
    {
        return $this->hasOne(ManifestationStatus::class);
    }

    public function currentStatus(): HasOne
    {
        return $this->hasOne(ManifestationStatus::class);
    }
}
