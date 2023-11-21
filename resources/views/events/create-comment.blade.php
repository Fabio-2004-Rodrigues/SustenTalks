@extends('layouts.main')

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-12 col-12 justify-contente-center my-4">
        <div class="container">
            <div class="mt-4">
                @if ($comments && count($comments) > 0)
                    @foreach ($comments as $comment)
                        <div class="card mb-2">
                            <div class="card-header profile-info d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    @if ($comment->user->user_image)
                                        <img src="{{ $comment->user->user_image }}" alt="{{ $comment->user->name }}"
                                            class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                                    @else
                                        <img src="/img/profile/default.jpg" alt="{{ $comment->user->name }}"
                                            class="profile-image">
                                    @endif
                                    <span>{{ $comment->user->name }}</span>
                                </div>

                                @if (Auth::id() == $comment->user_id)
                                    <div class="dropup">
                                        <button class="btn btn-sm btn-link text-dark" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <form action="{{ url('/comments/' . $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Apagar</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body">
                                {{ $comment->content }}
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">Seje o primeiro a comentar...</p>
                @endif

                <form id="commentForm" class="mt-5" action="{{ url('/comments') }}" method="POST">
                    @csrf
                    <input type="hidden" name="publication_id" value="{{ $publication->id }}">
                    <div class="form-group">
                        <textarea name="content" id="content" class="form-control" style="height: 200px;"
                            placeholder="Compartilhe seu comentário..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-custom my-3 d-block ms-auto">Comentar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    window.onload = function() {
        document.getElementById('commentForm').reset();
    };
</script>
