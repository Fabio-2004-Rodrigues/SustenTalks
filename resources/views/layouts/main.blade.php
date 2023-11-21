<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/style.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="/js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" defer>
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>

    <!-- Styles -->
    @livewireStyles

</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-3 p-0">
                <div class="sidebar d-flex flex-column justify-content-between px-4 py-4">
                    <div class="justify-content-center d-flex">
                        <a href="{{ route('welcome') }}">
                            <img src="/img/logo/logo.png" alt="logo SustenTalks" class="logo">
                            <img src="/img/logo/logo_mobile.png" alt="logo SustenTalks" class="logo-mobile">
                        </a>
                    </div>
                    <div class="icon-row">
                        <div class="hide-perfil-desktop">
                            <a href="{{ route('dashboard') }}" class="text-decoration-none">
                                <div class="profile-info">
                                    @if (Auth::user()->user_image)
                                        <img src="{{ Auth::user()->user_image }}" alt="{{ Auth::user()->name }}"
                                            class="profile-image">
                                    @else
                                        <img src="/img/profile/default.jpg" alt="{{ Auth::user()->name }}"
                                            class="profile-image">
                                    @endif
                                    <span class="ms-3">{{ Auth::user()->name }}</span>
                                </div>
                            </a>
                        </div>
                        <a href="{{ route('welcome') }}" class="btn text-start">
                            <i class="bi bi-house"></i> <span>Página Inicial</span>
                        </a>
                        <a href="{{ route('publications.create') }}" class="btn text-start">
                            <i class="bi bi-plus-square"></i> <span>Criar</span>
                        </a>
                        <div class="hide-perfil-mobile">
                            <a href="{{ route('dashboard') }}" class="text-decoration-none">
                                <div class="profile-info">
                                    @if (Auth::user()->user_image)
                                        <img src="{{ Auth::user()->user_image }}" alt="{{ Auth::user()->name }}"
                                            class="profile-image">
                                    @else
                                        <img src="/img/profile/default.jpg" alt="{{ Auth::user()->name }}"
                                            class="profile-image">
                                    @endif
                                    <span class="ms-3">{{ Auth::user()->name }}</span>
                                </div>
                            </a>
                        </div>
                        {{-- <a href="#" class="btn text-start">
                            <i class="bi bi-search"></i> <span>Pesquisar</span>
                        </a> --}}
                        <a href="{{ route('profile.show') }}" class="btn text-start">
                            <i class="bi bi-gear"></i> <span>Configurações</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a class="btn text-start config-mobile" href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                                <i class="bi bi-box-arrow-right"><span>{{ __('Sair') }}</span></i>
                            </a>
                        </form>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a class="btn text-start config" href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                                <i class="bi bi-box-arrow-right"></i> <span>Sair</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</body>

</html>
