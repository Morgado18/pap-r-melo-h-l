
@extends('layouts.authenticated.admin.main')

@section('pageTitle', 'Dashboard')

@section('currentPageTitle')

    Olá, Bem vindo de volta,
    @php
        $name_explod = explode(' ', $data['user']->name);
        $first_name = $name_explod[0];
    @endphp
    <strong>{{ $first_name }}</strong>!

@endsection

@section('currentPage', 'Dashboard')

@section('content')

    {{-- visit box --}}
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-user text-primary border-primary"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Visitantes</div>
                        <div class="stat-digit">
                            {{ $data['visits'] <= 9 ? "0" . $data['visits'] : $data['visits'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-cart-shoping text-success border-success"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Produtos com o status Disponível</div>
                        <div class="stat-digit">
                            {{ $data['available_products'] <= 9 ? "0" . $data['available_products'] : $data['available_products'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-user text-primary border-primary"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Compradores/Clientes</div>
                        <div class="stat-digit">
                            {{ $data['buyers'] <= 9 ? "0" . $data['buyers'] : $data['buyers'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-user text-primary border-primary"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Produtores</div>
                        <div class="stat-digit">
                            {{ $data['producers'] <= 9 ? "0" . $data['producers'] : $data['producers'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-link text-danger border-danger"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Vendas</div>
                        <div class="stat-digit">
                            ##
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- graphics --}}
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Venda dos Produtos</h4>
                </div>
                <div class="card-body">
                    <div class="ct-bar-chart mt-5"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="ct-pie-chart"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Últimos Produtos cadastrado --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Últimos 10 Produtos cadastrado</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Status</th>
                                    <th>Categoria</th>
                                    <th>Quantidade em Stock</th>
                                    <th>Quantidade min. para venda</th>
                                    <th>Preço</th>
                                    <th>Vendido</th>
                                    <th>Avaliações</th>
                                    <th>Produtor | ID</th>
                                    <th>
                                        <center>
                                            Info
                                        </center>
                                    </th>
                                    <th>Cadastrado em</th>
                                </tr>
                            </thead>
                            <tbody style="cursor: pointer;">
                                @foreach ($data['products'] as $product)

                                    <tr>
                                        <th>{{ $loop->index+1 }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td><span class="badge text-light
                                            @if ($product->status == "Disponível")
                                                    badge-success
                                                @elseif ($product->status == "Pendente" || $product->status == "Inativo" || $product->status == "Indisponível")
                                                    badge-warning
                                                @elseif ($product->status == "Esgotado")
                                                    badge-danger
                                                @endif

                                            ">{{ $product->status }}</span></td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->min_quant_to_buy }}</td>
                                        <td>{{ number_format($product->price, '2', ',', '.') }}kzs</td>
                                        <td>Sem info</td>
                                        <td>{{ ($product->average_rating == null) ? "0" : $product->average_rating}}</td>
                                        @php
$producer_name_explod = explode(' ', $product->producer_name);
$producer_first_name = $producer_name_explod[0];
$producer_last_name = end($producer_name_explod);
                                        @endphp
                                        <td>{{ $producer_first_name . " " . $producer_last_name }} | {{ $product->producer_id }}</td>
                                        <td>
                                            <center>
                                            <button class="btn border" data-toggle="modal" data-target="#modalMoreInfoProduct{{ $product->id }}">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                            </center>
                                        </td>
                                        <td class="color-danger">{{ date('d-m-Y, H:i', strtotime($product->created_at)) }}</td>
                                    </tr>

                                    <!-- modalMoreInfoProduct -->
                                    <div class="modal fade" id="modalMoreInfoProduct{{ $product->id }}">
                                        <div class="modal-dialog modal-l" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Mais informações do Produto</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <p>
                                                                <strong>Slug:</strong> {{ $product->slug }}
                                                            </p>
                                                            <p>
                                                                <strong>Descrição:</strong> <br>
                                                                {{ $product->description }}
                                                            </p>
                                                        </div>
                                                        {{-- slide --}}
                                                        <div class="col-lg-12">
                                                            <h5>
                                                                <strong>Imagens do Produto</strong> {{ $product->name }}
                                                            </h5>
                                                            <div class="card">
                                                                <div class="card-body p-4">
                                                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                                        <ol class="carousel-indicators">
                                                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                                                            </li>
                                                                            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                                                                            <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                                                                        </ol>
                                                                        <div class="carousel-inner">
                                                                            <div class="carousel-item active">
                                                                                <img class="d-block w-100" height="300" src="{{ asset('storage/products/batatas.jpeg') }}" alt="First slide">
                                                                            </div>
                                                                            <div class="carousel-item">
                                                                                <img class="d-block w-100" height="300" src="{{ asset('storage/products/cenoura.jpeg') }}" alt="Second slide">
                                                                            </div>
                                                                            <div class="carousel-item">
                                                                                <img class="d-block w-100" height="300" src="{{ asset('storage/products/batatas.jpeg') }}" alt="Third slide">
                                                                            </div>
                                                                        </div><a class="carousel-control-prev" href="#carouselExampleIndicators" data-slide="prev"><span
                                                                                class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a><a
                                                                            class="carousel-control-next" href="#carouselExampleIndicators" data-slide="next"><span
                                                                                class="carousel-control-next-icon"></span>
                                                                            <span class="sr-only">Next</span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                @endforeach
                                @if ($data['products']->isEmpty())
                                    <tr>
                                        <td colspan="13" class="text-warning text-center">
                                            Nenhum registo encontrado!
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- calender --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="year-calendar"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
