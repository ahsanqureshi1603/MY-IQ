<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public function subject()
    {
        return $this->belongsTo(Question::class);
    }

    public function questionSubject()
    {
        return $this->belongsTo(QuestionSubject::class);
    }
}
