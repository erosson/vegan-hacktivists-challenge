<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ask a Vegan</title>
    </head>
    <body>
      <h1><a href="/">Ask a Vegan</a></h1>

      <h2>questions.list</h2>

      <form method="post" action="">
        @csrf

        <textarea name="body" placeholder="TODO random placeholder">{{ old('body') }}</textarea>
        <div><button type="submit">Ask</button></div>

        @if ($errors->any())
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
          </ul>
        @endif
      </form>

      <ul>
        <li><a href="/questions/1">/questions/1</a></li>
      </ul>
    </body>
</html>
