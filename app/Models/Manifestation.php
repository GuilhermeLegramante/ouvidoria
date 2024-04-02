<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Manifestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'protocol_number',
        'manifestation_status_id',
        'manifestation_type_id',
        'comunication_type',
        'name',
        'cpf',
        'address',
        'phone',
        'email',
        'reported',
        'description',
        'request_reason_id',
    ];

    protected $casts = [
        'documents' => 'array',
        'movements' => 'array',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function movements(): HasMany
    {
        return $this->hasMany(ManifestationMovement::class);
    }

    public function requestReason(): BelongsTo
    {
        return $this->belongsTo(RequestReason::class, 'request_reason_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(ManifestationStatus::class, 'manifestation_status_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ManifestationType::class, 'manifestation_type_id');
    }
}
