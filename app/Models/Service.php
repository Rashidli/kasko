<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, Translatable, SoftDeletes;
    public $translatedAttributes = [
        'title',
        'description',
        'img_alt',
        'img_title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'short_description',
        'work_message',
        'off_message',
        'work_text',
        'off_text',
        'apply_text',
    ];
    protected $fillable = ['image','is_active','category_id','form_id','icon'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function form()
    {
        return $this->hasOne(Form::class,'id','form_id');
    }
}
