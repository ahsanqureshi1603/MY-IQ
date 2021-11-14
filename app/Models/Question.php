<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function answerKey()
    {
        return $this->hasOne(AnswerKey::class);
    }
    public function questionContent()
    {
        return $this->hasOne(QuestionContent::class, 'id', 'content_id');
    }
    public function questionSubject()
    {
        return $this->hasMany(QuestionSubject::class);
    }
    public function testSubmissions()
    {
        return $this->hasMany(TestSubmission::class);
    }
}
