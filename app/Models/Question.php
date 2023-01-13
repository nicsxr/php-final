<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'imgUrl',
        'ans1',
        "ans2",
        "ans2",
        "ans3",
        "ans4",
        "correctAnsPosition",
        "quiz_id"
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
