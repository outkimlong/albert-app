<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quizzes;

class QuizApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Quizzes $quiz)
    {
        $quiz->load('questions.options');
        
        return response()->json([
            'id' => $quiz->id,
            'title' => $quiz->title,
            'subject' => $quiz->subject,
            'questions' => $quiz->questions->map(function ($question) {
                return [
                    'id' => $question->id,
                    'question_text' => $question->question_text,
                    'question_latex' => $question->question_latex,
                    'options' => $question->options->map(function ($option) {
                        return [
                            'id' => $option->id,
                            'option_latex' => $option->option_latex,
                        ];
                    }),
                ];
            }),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Quizzes $quiz)
    {

        $quiz->load('questions.options');
        
        return response()->json([
            'id' => $quiz->id,
            'title' => $quiz->title,
            'description' => $quiz->description,
            'questions' => $quiz->questions->map(function ($question) {
                return [
                    'id' => $question->id,
                    'question_text' => $question->question_text,
                    'question_latex' => $question->question_latex,
                    'options' => $question->options->map(function ($option) {
                        return [
                            'id' => $option->id,
                            'option_latex' => $option->option_latex,
                        ];
                    }),
                ];
            }),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
