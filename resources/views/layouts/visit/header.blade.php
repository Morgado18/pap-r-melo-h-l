<header id="header" class="header d-flex align-items-center
@if(Route::is('pageMain'))
    fixed-top
@else
    sticky-top
@endif
">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Agrifácil</h1><span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/#hero" @if(Route::is('pageMain')) class="active" @endif>Página inicial</a></li>
                <li><a href="/#about">Sobre nós</a></li>
                <li><a href="/#services">Serviços</a></li>
                <li><a href="/#contact">Contacto</a></li>
                @guest
                    <li class="dropdown"><a href="cadastro.html"><span>Começar como</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('create_account.producer') }}">Produtor</a></li>
                            <li><a href="{{ route('create_account.buyer') }}">Comprador</a></li>
                        </ul>
                    </li>
                @endguest
                <li><a href="{{ route('visit.products') }}" @if(Route::is('visit.products')) class="active" @endif>Produtos</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Iniciar sessão</a></li>
                @endguest
                @auth
                    <li><a href="
                        @if($data['user']->access_level_id == 1)
                            {{ route('admin.dash') }}
                            @elseif($data['user']->access_level_id == 2)
                            {{ route('producer.dash') }}
                            @elseif($data['user']->access_level_id == 3)
                            {{ route('buyer.dash') }}
                        @endif
                    ">Dashboard</a></li>
                @endauth
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn btn-success position-relative" style="margin-right: 1rem" href="{{ route('visit.mycart') }}">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ count(session('cart', [])) }}
                <span class="visually-hidden">products</span>
            </span>
        </a>

    </div>
</header>

<!-- @morgadomelo -->
