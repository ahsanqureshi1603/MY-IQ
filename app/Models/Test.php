<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    public $incrementing = false;
    public function testSubmissions()
    {
        return $this->hasMany(TestSubmission::class);
    }
}
