<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function list() {
      // TODO db lookup questions
      return view('questions.list');
    }
    public function create(Request $req) {
      // https://laravel.com/docs/8.x/validation
      $req->validate([
        'body' => ['required', 'min:5', 'ends_with:?'],
      ]);
      // request.validate() throws a redirect on failure - so if we get here, validation passed

      // TODO db insert

      return redirect('/');
    }
    public function show(int $question) {
      // TODO db lookup question
      return view('questions.show', ['id' => $question]);
    }
}
