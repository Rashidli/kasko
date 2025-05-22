<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'service_id',
        'locale',
        'img_alt',
        'img_title',
        'slug',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'short_description',
        'work_message',
        'off_message',
        'work_text',
        'off_text',
        'apply_text',
    ];
}
