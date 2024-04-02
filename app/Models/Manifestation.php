<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function requestReason(): HasOne
    {
        return $this->hasOne(RequestReason::class);
    }
}
