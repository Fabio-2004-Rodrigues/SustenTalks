@extends('layouts.main')

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-12 col-12 justify-contente-center my-4">
        @if (Auth::user())
            <div class="container">
                <div class="d-flex flex-row align-items-center mb-4">
                    @if (Auth::user()->user_image)
                        <img src="{{ Auth::user()->user_image }}" alt="{{ Auth::user()->name }}">
                    @else
                        <img class="rounded-circle" src="/img/profile/default.jpg" alt="{{ Auth::user()->name }}">
                    @endif
                    <span class="ms-3">{{ Auth::user()->name }}</span>
                </div>
                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="publicacoes-tab" data-bs-toggle="tab" href="#publicacoes"
                            role="tab" aria-controls="publicacoes" aria-selected="true">Publicações</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="comentarios-tab" data-bs-toggle="tab" href="#comentarios" role="tab"
                            aria-controls="comentarios" aria-selected="false">Comentários</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="curtidas-tab" data-bs-toggle="tab" href="#curtidas" role="tab"
                            aria-controls="curtidas" aria-selected="false">Curtidas</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a class="nav-link" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                <i class="bi bi-box-arrow-right"><span>{{ __('Sair') }}</span></i>
                            </a>
                        </form>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active row-gap-4" id="publicacoes" role="tabpanel"
                        aria-labelledby="publicacoes-tab">
                        <div class="row-gap-4 d-flex flex-column my-4">
                            @php
                                $sortedPublications = $publications->sortByDesc('created_at');
                            @endphp
                            @forelse ($sortedPublications as $publication)
                                @component('components.publication', ['publication' => $publication])
                                @endcomponent
                            @empty
                                <p class="text-center">Você não publicou nada.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="tab-pane fade" id="comentarios" role="tabpanel" aria-labelledby="comentarios-tab">
                        <div class="row-gap-4 d-flex flex-column my-4">
                            @forelse ($commentedPublications as $publication)
                                @component('components.publication', ['publication' => $publication])
                                @endcomponent
                            @empty
                                <p class="text-center">Você não fez nenhum comentário.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="tab-pane fade" id="curtidas" role="tabpanel" aria-labelledby="curtidas-tab">
                        <div class="row-gap-4 d-flex flex-column my-4">
                            @forelse ($likedPublications as $publication)
                                @component('components.publication', ['publication' => $publication])
                                @endcomponent
                            @empty
                                <p class="text-center">Você não curtiu nada.</p>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </div>

@endsection
