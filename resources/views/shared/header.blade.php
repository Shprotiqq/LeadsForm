<header class="mb-auto">
    <div>
        <h3 class="float-md-start mb-0">Leads</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link fw-bold py-1 px-0 @if(request()->fullUrlIs(route('home'))) active @endif"
               aria-current="page" href="{{ route('home')  }}">Главная</a>
            @auth
                <a class="nav-link fw-bold py-1 px-0 @if(request()->fullUrlIs(route('profile'))) active @endif"
                   href="{{ route('profile') }}">{{ auth()->user()->name }}</a>
                <a class="nav-link fw-bold py-1 px-0" href="{{ route('logout') }}">Выход</a>
            @endauth

            @guest
                <a class="nav-link fw-bold py-1 px-0" href="{{ route('login.create') }}">Вход</a>
                <a class="nav-link fw-bold py-1 px-0" href="{{ route('register.create') }}">Регистрация</a>
            @endguest
        </nav>
    </div>
</header><?php
