<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function list() {
      // $questions = Question::all();
      $questions = Question::withCount('answers')->orderBy('created_at', 'desc')->get();
      return view('questions.list', ['questions' => $questions]);
    }
    public function create(Request $req) {
      // https://laravel.com/docs/8.x/validation
      $req->validate([
        'body' => ['required', 'min:5', 'ends_with:?'],
      ]);
      // request.validate() throws a redirect on failure - so if we get here, validation passed

      $question = new Question;
      $question->body = $req->body;
      $question->save();

      return redirect("/questions/{$question->id}");
    }
    public function show(Question $question) {
      return view('questions.show', ['question' => $question, 'answers' => $question->answers()]);
    }
}
