<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Insurance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function property(): HasOne
    {
        return $this->hasOne(Property::class);
    }

    public function insuredPerson(): HasOne
    {
        return $this->hasOne(InsuredPerson::class);
    }

    public function operator(): HasOne
    {
        return $this->hasOne(Operator::class);
    }

    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Operator::class);
    }
}
