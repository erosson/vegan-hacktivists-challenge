<x-layout>
    <form method="post" action="">
        @csrf

        <div class="form-group">
            <textarea class="form-control" name="body" placeholder="{{ $placeholder }}">{{ old('body') }}</textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Ask</button>
        </div>

        @if ($errors->any())
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>

    <h1>Questions for Vegans</h1>

    @if ($questions->isEmpty())
        <p>No questions yet.</p>
    @else
        <div class="list-group">
            @foreach ($questions as $question)
                <a class="list-group-item list-group-item-action" href="/questions/{{ $question->id }}">
                    <div>{{ $question->body }}</div>
                    <div><small class="text-secondary">asked {{ $question->created_at->diffForHumans() }}</small></div>
                    <div><small class="text-secondary">{{ $question->answers_count }} {{ Str::plural('answer', $question->answers_count) }}</small></div>
                </a>
            @endforeach
        </div>
    @endif
</x-layout>
