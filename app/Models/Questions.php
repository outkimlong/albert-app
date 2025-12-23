<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Options;
use App\Models\Quizzes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Questions extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'questions';
    public function options()
    {
        return $this->hasMany(Options::class, 'question_id');
    }
    public function quiz()
    {
        return $this->belongsTo(Quizzes::class);
    }
}
