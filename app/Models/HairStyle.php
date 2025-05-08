<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HairStyle extends Model
{
    protected $guarded = [];

    public function rules(): HasMany
    {
        return $this->hasMany(Rule::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($hairstyle) {
            if ($hairstyle->gambar) {
                Storage::disk('public')->delete($hairstyle->gambar);
            }
        });
    }
}
