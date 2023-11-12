@extends('layouts.main')

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-12 col-12 justify-contente-center my-4">
        @if (Auth::user())
            <div class="container">
                <div class="d-flex flex-row align-items-center mb-4">
                    @if (Auth::user()->user_image)
                        <img src="{{ Auth::user()->user_image }}" alt="{{ Auth::user()->name }}">
                    @else
                        <img src="/img/profile/default.jpg" alt="{{ Auth::user()->name }}">
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
                        <a class="nav-link" id="seguidores-tab" data-bs-toggle="tab" href="#seguidores" role="tab"
                            aria-controls="seguidores" aria-selected="false">Seguidores</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="sobre-tab" data-bs-toggle="tab" href="#sobre" role="tab"
                            aria-controls="sobre" aria-selected="false">Sobre</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="publicacoes" role="tabpanel"
                        aria-labelledby="publicacoes-tab">
                        <div class="row-gap-4 d-flex flex-column">
                            @foreach ($publications as $publication)
                                @if ($publication->user_id == Auth::id())
                                    @component('components.publication', ['publication' => $publication])
                                    @endcomponent
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="comentarios" role="tabpanel" aria-labelledby="comentarios-tab">
                        @foreach ($commentedPublications as $publication)
                            @component('components.publication', ['publication' => $publication])
                            @endcomponent
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="curtidas" role="tabpanel" aria-labelledby="curtidas-tab">
                        <!-- Conteúdo da aba Curtidas -->
                    </div>
                    <div class="tab-pane fade" id="seguidores" role="tabpanel" aria-labelledby="seguidores-tab">
                        <!-- Conteúdo da aba Seguidores -->
                    </div>
                    <div class="tab-pane fade" id="sobre" role="tabpanel" aria-labelledby="sobre-tab">
                        <!-- Conteúdo da aba Sobre -->
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
