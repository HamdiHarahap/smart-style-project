<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HairType extends Model
{
    protected $guarded = [];

    public function rules(): HasMany
    {
        return $this->hasMany(Rule::class);
    }
}
