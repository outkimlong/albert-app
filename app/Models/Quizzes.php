<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Questions;

class Quizzes extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'quizzes';
    protected $fillable = [
        'id', 
        'title',
        'subject',
        'grade',
    ];
    public function questions()
    {
        return $this->hasMany(Questions::class, 'quiz_id');
    }
}
