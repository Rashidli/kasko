<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormField extends Model
{

    use HasFactory, Translatable, SoftDeletes;
    public $translatedAttributes = ['label','options','placeholder'];
    protected $fillable = ['is_active','name','type','is_required','form_id'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

}
