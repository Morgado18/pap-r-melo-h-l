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
                <li class="dropdown"><a href="cadastro.html"><span>Entrar</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('create_account.producer') }}">Produtor</a></li>
                        <li><a href="{{ route('create_account.buyer') }}">Comprador</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('visit.products') }}" @if(Route::is('visit.products')) class="active" @endif>Produtos</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn btn-success position-relative" href="index.html#about">
            {{-- <button type="button" class="btn btn-primary position-relative"> --}}
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    0
                    <span class="visually-hidden">products</span>
                </span>
            {{-- </button> --}}
        </a>

    </div>
</header>

<!-- @morgadomelo -->

{{--
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Append</h1><span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="index.html#hero" class="active">Página inicial</a></li>
                <li><a href="index.html#about">Sobre nós</a></li>
                <li><a href="index.html#services">Serviços</a></li>
                <li><a href="index.html#contact">Contacto</a></li>
                <li class="dropdown"><a href="#"><span>Entrar</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Produtor</a></li>
                        <li><a href="#">Comprador</a></li>
                    </ul>
                </li>
                <li><a href="blog.html">Produtos</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="index.html#about">Get Started</a>

    </div>
</header>
 --}}
