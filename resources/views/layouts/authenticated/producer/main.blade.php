<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="" rel="icon">
    <link href="{{ asset('buyer/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('buyer/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('buyer/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('buyer/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('buyer/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('buyer/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('buyer/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('buyer/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!--  Main CSS File -->
    <link href="{{ asset('buyer/assets/css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('swalert/sweetalert2@11.js') }}"></script>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('imgs/teamwork.png') }}" alt="o logo não carregou!">
                <span class="d-none d-lg-block">Agrifácil.</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('imgs/unknown.jpg') }}" alt="Profile" class="rounded-circle">
                        @php
$name = explode(' ', $data['user']->name);
                        @endphp
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ end($name) }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ $name[0] . " " . end($name) }}</h6>
                            <span>Produtor</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>Meu Perfil</span>
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Terminar sessão</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('producer.dash') ? '' : 'collapsed' }}" href="{{ route('producer.dash') }}">
                    <i class="bi bi-grid"></i>
                    <span>Painel</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('pageMain') }}">
                    <i class="bi bi-house-door"></i>
                    <span>Página inicial</span>
                </a>
            </li>

            <li class="nav-heading">Vendas</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('producer.orders.all') ? '' : 'collapsed' }}" href="{{ route('producer.orders.all') }}">
                    <i class="bi bi-chat-square-text"></i>
                    <span>Todos os pedidos</span>
                </a>
            </li>

            <li class="nav-heading">Clientes</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('producer.costumers.all') ? '' : 'collapsed' }}" href="{{ route('producer.costumers.all') }}">
                    <i class="bi bi-person"></i>
                    <span>Meus clientes</span>
                </a>
            </li>

            <li class="nav-heading">Produtos</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('producer.products.all') ? '' : 'collapsed' }}" href="{{ route('producer.products.all') }}">
                    <i class="bi bi-cart"></i>
                    <span>Meus produtos</span>
                </a>
            </li>

            <li class="nav-heading">Chat</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('producer.chats.all') ? '' : 'collapsed' }}" href="{{ route('producer.chats.all') }}">
                    <i class="bi bi-bell"></i>
                    <span>Mensagens</span>
                </a>
            </li>

            <li class="nav-heading">Configurações</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('producer.profile') ? '' : 'collapsed' }}" href="{{ route('producer.profile') }}">
                    <i class="bi bi-person"></i>
                    <span>Meu perfil</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Terminar sessão</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">@csrf</form>
            </li>

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Painel do Produtor</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">@yield('location2')</li>
                </ol>
            </nav>
        </div>

        @yield('content')

    </main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Agrifácil</span></strong>. Todos os direitos reservado
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('buyer/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('buyer/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('buyer/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('buyer/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('buyer/assets/vendor/quill/quill.js') }}"></script>
<script src="{{ asset('buyer/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('buyer/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('buyer/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('buyer/assets/js/main.js') }}"></script>

</body>

</html>
