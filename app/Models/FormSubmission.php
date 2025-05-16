<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class FormSubmission extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'data' => 'array',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::updating(function ($formSubmission): void {
            if ($formSubmission->isDirty('note')) {
                OrderLog::create([
                    'form_submission_id' => $formSubmission->id,
                    'user_id'            => Auth::id(),
                    'note'               => $formSubmission->note,
                ]);
            }
        });
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function order_logs()
    {
        return $this->hasMany(OrderLog::class);
    }

    public function getStatusTitleAttribute()
    {
        return OrderStatus::query()->where('value', $this->status)->first()?->title ?? '-';
    }

    public function getStatusColorAttribute()
    {
        return OrderStatus::query()->where('value', $this->status)->first()?->color ?? '-';
    }
}
