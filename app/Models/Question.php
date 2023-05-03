<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'technology_id',
        'level_id',
        'question_text',
        'option1',
        'option2',
        'option3',
        'option4',
        'answer_type',
        'answer',
        'time_required'
    ];

    public function technology(): BelongsTo
    {
        return $this->belongsTo(Technology::class);
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(DeveloperLevel::class);
    }
}
