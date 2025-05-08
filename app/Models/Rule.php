<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rule extends Model
{
    protected $guarded = [];

    public function hairType(): BelongsTo 
    {
        return $this->belongsTo(HairType::class);
    }

    public function faceShape(): BelongsTo
    {
        return $this->belongsTo(FaceShape::class);
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    public function hairStyle(): BelongsTo
    {
        return $this->belongsTo(HairStyle::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }
}
