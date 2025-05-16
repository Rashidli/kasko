<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Main extends Model
{
    use HasFactory, Translatable, SoftDeletes;
    public $translatedAttributes = ['title','description','img_alt','img_title'];
    protected $fillable = ['image','is_active','mobile_image','date','link','type','row'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

}
