@extends('layouts.main')

@section('title', 'Feed')

@section('content')
    <div class="col-md-7 col-lg-5 row-gap-4 d-flex flex-column my-4">
        @foreach ($publications as $publication)
            @component('components.publication', ['publication' => $publication])
            @endcomponent
        @endforeach
    </div>

    <div class="col-md-2 friend-suggestions my-4">
        @php
            $users = \App\Models\User::all();
        @endphp
        <h5>Sugestões de Amizade</h5>
        @foreach ($users as $user)
            @if (auth()->id() == $user->id)
                @continue
            @endif

            <div class="side-list-item profile-info my-2">
                @if ($user->user_image)
                    <img src="{{ $user->user_image }}" alt="{{ $user->name }}" class="profile-image">
                @else
                    <img src="/img/profile/default.jpg" alt="{{ $user->name }}" class="profile-image">
                @endif
                <span class="side-list-text">{{ $user->name }}</span>
            </div>
        @endforeach
    </div>
@endsection
