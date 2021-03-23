<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function list()
    {
        $questions = Question::withCount('answers')->orderBy('created_at', 'desc')->get();
        return view('questions.list', [
            'questions' => $questions,
            'placeholder' => PLACEHOLDERS[array_rand(PLACEHOLDERS)],
        ]);
    }
    public function create(Request $req)
    {
        $req->validate([
            'body' => ['required', 'min:5', 'ends_with:?'],
        ]);

        $question = new Question;
        $question->body = $req->body;
        $question->save();

        return redirect("/questions/{$question->id}");
    }
    public function show(Question $question)
    {
        return view('questions.show', [
            'question' => $question,
            'answers' => $question->answers(),
        ]);
    }
}

const PLACEHOLDERS = [
    "What's your favorite vegetable?",
    "How long have you been vegan?",
    "Why did you go vegan?",
    "Are you still vegan when you travel?",
    "How do they milk the almonds?",
    "How do you really feel about milk powder?",
    "Bacon tho?",
    "\"'/><b mouseover=alert(/xss/)>Are my beliefs about cross-site scripting in PHP outdated?",
    "\"';drop table questions;--Are my beliefs about SQL injection in PHP outdated?",
];
