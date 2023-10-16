@foreach ($publications as $publication)
    <div class="custom-card rounded px-3">
        <div class="mt-1 mb-3 d-flex justify-content-between align-items-center">
            <div class="card-header profile-info">
                @if ($publication->user->user_image)
                    <img src="{{ $publication->user->user_image }}" alt="{{ $publication->user->name }}"
                        class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                @else
                    <img src="/img/profile/default.jpg" alt="{{ $publication->user->name }}" class="profile-image">
                @endif
                <h5 class="card-title ms-3">{{ $publication->user->name }}</h5>
            </div>
            @if (Auth::id() == $publication->user_id)
                <div class="text-center">
                    <form action="{{ url('/publications/' . $publication->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger py-2 px-3 btn-sm">Apagar</button>
                    </form>
                </div>
            @endif
        </div>
        <div class="card-body">
            @if ($publication->description)
                <p>{{ $publication->description }}</p>
            @endif
            @if ($publication->media)
                <img class="mb-3" src="/img/events/publications/{{ $publication->media }}"
                    alt="{{ $publication->description }}" class="img-fluid">
            @endif
        </div>
        @if ($publication->likes->count() > 0 || $publication->likes->count() > 0)
            <div class="d-flex justify-content-between py-2 px-2 mb-4 border-top border-bottom">
                <div>
                    @if ($publication->likes->count() > 0)
                        <div class="d-flex align-items-center">
                            <i class="fas fa-thumbs-up text-success"></i>
                            <span class="ms-2">{{ $publication->likes->count() }}</span>
                        </div>
                    @endif
                </div>
                <div>
                    @if ($publication->comments->count() > 0)
                        <div class="d-flex align-items-center">
                            <a href="{{ route('comments.create', ['publication' => $publication->id]) }}"><span>{{ $publication->comments->count() }}
                                    comentários</span></a>
                        </div>
                    @endif
                </div>
            </div>
        @endif
        <div class="card-footer">
            <div class="d-flex justify-content-evenly flex-row">
                <div class="text-center">
                    @if ($publication->likes->where('user_id', Auth::id())->first())
                        <form action="{{ url('/unlike/' . $publication->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-2 px-3 btn btn-outline-secondary btn-sm btn-hover-gray">
                                <i class="me-2 fas fa-thumbs-up text-success"></i>Curtir
                            </button>
                        </form>
                    @else
                        <form action="{{ url('/like/' . $publication->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn py-2 px-3 btn-outline-secondary btn-sm btn-hover-green">
                                <i class="me-2 fas fa-thumbs-up border-success"></i>Curtir
                            </button>
                        </form>
                    @endif
                </div>
                <div class="text-center">
                    <a href="{{ route('comments.create', ['publication' => $publication->id]) }}"
                        class="btn btn-outline-secondary py-2 px-3 btn-sm">
                        <i class="me-2 fas fa-comment"></i> Comentar
                    </a>
                </div>
                <div class="text-center">
                    <button class="py-2 px-3 btn btn-outline-secondary btn-sm"><i class="me-2 fas fa-share"></i>
                        Compartilhar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
