<x-layout>
  <h2>{{$question->body}}</h2>
  <i>{{$question->created_at}}</i>

  <form method="post" action="">
    @csrf

    <textarea name="body">{{ old('body') }}</textarea>
    <div><button type="submit">Answer</button></div>

    @if ($errors->any())
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      </ul>
    @endif
  </form>

  <ul>
    @foreach ($question->answers as $answer)
      <li>
        <p>{{$answer->body}}</p>
        <i>{{$answer->created_at}}</i>
      </li>
    @endforeach
  </ul>
</x-layout>
