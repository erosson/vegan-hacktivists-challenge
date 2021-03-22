<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function create(Request $req, int $question) {
      // https://laravel.com/docs/8.x/validation
      $req->validate([
        'body' => ['required', 'min:5'],
      ]);

      // TODO db insert

      return redirect("/questions/${question}");
    }
}
