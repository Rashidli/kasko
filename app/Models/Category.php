<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, Translatable, SoftDeletes;
    public $translatedAttributes = ['title'];
    protected $fillable = ['image','row'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
