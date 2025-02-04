<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Menu principal</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-home"></i><span class="nav-text">Dashboard</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('pageMain') }}">Página inicial</a></li>
                    <li><a href="{{ route('admin.dash') }}">Dashboard</a></li>
                </ul>
            </li>

            <li class="nav-label">Produtos</li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-chart-bar-33"></i><span class="nav-text">Gestão de Produtos</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.products.all') }}">Todos Produtos</a></li>
                    <li><a href="{{ route('admin.products.available') }}">Produtos Disponível</a></li>
                    <li><a href="{{ route('admin.products.pending') }}">Produtos Pendente</a></li>
                    <li><a href="{{ route('admin.products.sold_out') }}">Produtos Esgotado</a></li>
                    <li><a href="{{ route('admin.products.unavailable') }}">Produtos Inativo</a></li>
                </ul>
            </li>

            <li class="nav-label">Administração</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="fa-solid fa-users"></i><span class="nav-text">Gestão de Utilizadores</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.administration.users.all') }}">Todos Utilizadores</a></li>
                    <li><a href="{{ route('admin.administration.producers.all') }}">Produtores</a></li>
                    <li><a href="{{ route('admin.administration.buyers.all') }}">Compradores</a></li>
                </ul>
            </li>

            <li class="nav-label">Sistema</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-layout-25"></i><span class="nav-text">Actividades</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.activities.logs') }}">Logs</a></li>
                    <li><a href="{{ route('admin.activities.visits') }}">Visitantes</a></li>
                </ul>
            </li>

            <div class="row container">
                <div class="col-12 mt-3 ml-3">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <button class="btn bg-danger w-100">
                            Terminar sessão
                        </button>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">@csrf</form>
                </div>
            </div>
        </ul>
    </div>
</div>
