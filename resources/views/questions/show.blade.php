<x-layout>
  <h3>{{$question->body}}</h3>
  <div><small class="text-secondary">{{ $question->created_at->diffForHumans() }}</small></div>

  <form method="post" action="">
    @csrf

    <div class="form-group">
      <textarea class="form-control" name="body" placeholder="Your helpful answer...">{{ old('body') }}</textarea>
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit">Answer</button>
    </div>

    @if ($errors->any())
      <ul class="list-group">
      @foreach ($errors->all() as $error)
        <li class="list-group-item list-group-item-danger">{{$error}}</li>
      @endforeach
      </ul>
    @endif
  </form>

  @if ($question->answers->isEmpty())
    <p>No answers yet.</p>
  @else
    <ul class="list-group">
      @foreach ($question->answers as $answer)
        <li class="list-group-item">
          <p>{{$answer->body}}</p>
          <small class="text-secondary">{{$answer->created_at->diffForHumans()}}</small>
        </li>
      @endforeach
    </ul>
  @endif
</x-layout>
