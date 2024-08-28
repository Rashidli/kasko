<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldTranslation extends Model
{

    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['label','options','form_field_id','locale','placeholder'];

}
