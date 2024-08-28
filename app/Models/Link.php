<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{

    use HasFactory, Translatable, SoftDeletes;
    public $translatedAttributes = ['title','meta_title','meta_description','meta_keywords','slug'];
    protected $fillable = ['is_active','description'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

}
