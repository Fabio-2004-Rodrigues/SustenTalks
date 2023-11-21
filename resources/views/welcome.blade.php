@extends('layouts.main')

@section('title', 'Feed')

@section('content')
    <div class="col-md-7 col-lg-5 row-gap-4 d-flex flex-column my-4">
        @php
            $sortedPublications = $publications->sortByDesc('created_at');
        @endphp
        @foreach ($sortedPublications as $publication)
            @component('components.publication', ['publication' => $publication])
            @endcomponent
        @endforeach
    </div>

    <div class="col-md-2 friend-suggestions my-4">
        {{-- @php
            $users = \App\Models\User::where('id', '!=', auth()->id())->get();
        @endphp

        @if ($users->isNotEmpty())
            <div class="my-4">
                <h5>Sugestões de Amizade</h5>
                @foreach ($users as $user)
                    <div class="side-list-item profile-info my-4">
                        @if ($user->user_image)
                            <img src="{{ $user->user_image }}" alt="{{ $user->name }}" class="profile-image">
                        @else
                            <img src="/img/profile/default.jpg" alt="{{ $user->name }}" class="profile-image">
                        @endif
                        <span class="side-list-text">{{ $user->name }}</span>
                    </div>
                @endforeach
            </div>
        @endif --}}
    </div>
@endsection
