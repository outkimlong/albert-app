<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quizzes;
use App\Models\Questions;
use App\Models\Option;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('admin.questions.create', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Quizzes $quiz)
    {
        return view('questions.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request, Quizzes $quiz)
    {
        $question = $quiz->questions()->create([
            'question_text' => $request->question_text,
            'question_latex' => $request->question_latex,
            'type' => 'mcq',
        ]);

        // foreach ($request->options as $index => $option) {
        //     $question->options()->create([
        //         'option_latex' => $option,
        //         'is_correct' => $request->correct == $index,
        //     ]);
        // }

        return redirect()->route('quizzes.show', $quiz);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource. Quiz $quiz, Question $question
     */
    public function edit(Questions $question, Quizzes $quiz)
    {
        $quiz = $question->quiz; // <-- IMPORTANT
        return view('questions.edit', compact('question', 'quiz'));
        // $question->load('options');
        // return view('questions.edit', compact('quiz', 'question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Questions $question)
    {
        $quiz = $question->quiz; 
        $question->update($request->only('question_text', 'question_latex'));

        // foreach ($question->options as $i => $option) {
        //     $option->update([
        //         'option_latex' => $request->options[$i],
        //         'is_correct' => $request->correct == $i,
        //     ]);
        // }

         return redirect()->route('quizzes.show', $quiz);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questions $question)
    {
        $question->delete();
        return back();
    }
}
