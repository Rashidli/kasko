<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkTranslation extends Model
{

    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['title','link_id','locale','meta_title','meta_description','meta_keywords','slug'];

}
