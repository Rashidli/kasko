<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function formFields()
    {
        return $this->hasMany(FormField::class);
    }

    public function form_submissions()
    {
        return $this->hasMany(FormSubmission::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'id','form_id');
    }

}
