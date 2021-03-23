<x-layout>
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

  @if ($questions)
    <table>
      @foreach ($questions as $question)
        <tr>
          <td><a href="/questions/{{$question->id}}">{{$question->body}}</a></td>
          <td>{{$question->answers_count}} answers</td>
          <td>{{$question->created_at}}</td>
        </tr>
      @endforeach
    </table>
  @else
    <p>No questions yet.</p>
  @endif
</x-layout>
