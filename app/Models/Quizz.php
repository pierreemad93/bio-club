<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Quizz extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = [
        'lo',
        'question',
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4',
        'correct_answer',
        'grade_id',
    ];
    /**
     * Scope a query to get grade for question.
     */
    public function scopeGrade(Builder $query, $type): void
    {
        $query->when($type, function ($query) use ($type) {
            $query->where('grade_id', $type);
        });
    }
    /**
     * Scope a query to get lo for question.
     */
    public function scopeLo(Builder $query, $type): void
    {
        $query->when($type, function ($query) use ($type) {
            $query->where('lo', $type);
        });
    }
    /**
     * return Collection 
     */
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }
}
