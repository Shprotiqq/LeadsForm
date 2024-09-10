<header class="mb-auto">
    <div>
        <a href="{{ route('home') }}" class="text-white"><h3 class="float-md-start mb-0">Leads</h3></a>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link fw-bold py-1 px-0 @if(request()->fullUrlIs(route('home'))) active @endif"
               aria-current="page" href="{{ route('home')  }}">Главная</a>
            @auth
                <a class="nav-link fw-bold py-1 px-0 @if(request()->fullUrlIs(route('statistics'))) active @endif"
                   href="{{ route('statistics') }}">Статистика лидов
                </a>
                <a class="nav-link fw-bold py-1 px-0 @if(request()->fullUrlIs(route('profile'))) active @endif"
                   href="{{ route('profile') }}">{{ auth()->user()->name }}
                </a>
                <a class="nav-link fw-bold py-1 px-0" href="{{ route('logout') }}">Выход</a>
            @endauth

            @guest
                <a class="nav-link fw-bold py-1 px-0 @if(request()->fullUrlIs(route('login.create'))) active @endif"
                href="{{ route('login.create') }}">Вход</a>
                <a class="nav-link fw-bold py-1 px-0 @if(request()->fullUrlIs(route('register.create'))) active @endif"
                   href="{{ route('register.create') }}">Регистрация</a>
            @endguest
        </nav>
    </div>
</header><?php
