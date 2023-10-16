@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="mt-4">
            @if ($comments && count($comments) > 0)
                @foreach ($comments as $comment)
                    <div class="card mb-2">
                        <div class="card-header">
                            @if ($comment->user->user_image)
                                <img src="{{ $comment->user->user_image }}" alt="{{ $comment->user->name }}"
                                    class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                            @else
                                <img src="/img/profile/default.jpg" alt="{{ $comment->user->name }}" class="profile-image">
                            @endif
                            <span>{{ $comment->user->name }}</span>
                        </div>
                        <div class="card-body">
                            {{ $comment->content }}
                            @if (Auth::id() == $comment->user_id)
                                <form action="{{ url('/comments/' . $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <p>Nenhum comentário ainda.</p>
            @endif

            <form action="{{ url('/comments') }}" method="POST">
                @csrf
                <input type="hidden" name="publication_id" value="{{ $publication->id }}">
                <div class="form-group">
                    <label for="content">Novo Comentário</label>
                    <textarea class="form-control" id="content" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comentar</button>
            </form>
        </div>
    </div>
@endsection
