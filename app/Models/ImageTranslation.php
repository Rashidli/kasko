<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageTranslation extends Model
{

    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['image_id','locale','img_alt','img_title'];

}
