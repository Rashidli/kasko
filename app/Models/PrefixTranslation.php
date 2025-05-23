<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrefixTranslation extends Model
{

    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['prefix','prefix_id','locale','value'];

}
