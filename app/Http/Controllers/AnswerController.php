<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function create(Request $req, Question $question)
    {
        // https://laravel.com/docs/8.x/validation
        $req->validate([
            'body' => ['required', 'min:5'],
        ]);

        $answer = new Answer;
        $answer->question_id = $question->id;
        $answer->body = $req->body;
        $answer->save();

        return redirect("/questions/{$question->id}");
    }
}
