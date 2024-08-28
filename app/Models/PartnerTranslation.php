<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['partner_id','locale','img_alt','img_title'];
}
