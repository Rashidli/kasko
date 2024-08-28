<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvantageTranslation extends Model
{

    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['title','description','advantage_id','locale','img_alt','img_title'];

}
