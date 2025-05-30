<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'form_submission_id',
        'user_id',
        'note',
    ];

    public function formSubmission()
    {
        return $this->belongsTo(FormSubmission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
