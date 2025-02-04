
@extends('layouts.authenticated.admin.main')

@section('pageTitle', 'Produtos Pendente')

@section('currentPageTitle')

    Listando Todos os Produtos Pendente

@endsection


@section('currentPage', 'Produtos Pendente')

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="car-header">
                    {{-- <h4 class="card-title">Table Bordered</h4> --}}
                    <div class="row mt-3 container-fluid ">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="get" class="">
                                        <input type="search" name="search" value="{{ request('search') ? request('search') : "" }}"
                                            placeholder="Pesquisar produto" class="form-control" {{ ($data['products']->isEmpty()) ? "disabled" : "" }}>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form action="" class="">
                                        <select name="" id="" class="form-control" {{ ($data['products']->isEmpty()) ? "disabled" : "" }}>
                                            <option disabled>Filtrar produtos</option>
                                            <option value="show_5" selected>Exibir 5</option>
                                            <option value="show_50">Exibir 50</option>
                                            <option value="show_all">Exibir todos</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <th>
                                        <center>
                                            Opções
                                        </center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody style="cursor: pointer;">
                                @foreach ($data['products'] as $product)

                                                                                                    <tr>
                                                                                                        <th>{{ $product->id }}</th>
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
                                                                                                        <td>
                                                                                                            <center>
                                                                                                                <button class="btn border dropdown-toggl" data-toggle="dropdown">
                                                                                                                    <i class="fa-solid fa-arrow-down"></i>
                                                                                                                </button>
                                                                                                                <div class="dropdown-menu">
                                                                                                                    <a class="dropdown-item" href="#modalEdit{{ $product->id }}" data-toggle="modal" data-target="#modalEdit{{ $product->id }}">Editar</a>
                                                                                                                    <div class="dropdown-divider"></div>
                                                                                                                    <a class="dropdown-item" href="{{ route('admin.products.remove', ['slug' => $product->slug]) }}">Remover</a>
                                                                                                                    {{-- <div class="dropdown-divider"></div> --}}
                                                                                                                </div>
                                                                                                            </center>
                                                                                                        </td>
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

                                                                                                    <!-- Modal edit -->
                                                                                                    <div class="modal fade" id="modalEdit{{ $product->id }}">
                                                                                                        <div class="modal-dialog" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    <h5 class="modal-title">Editar produto</h5>
                                                                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body">
                                                                                                                     @include('authenticated.admin.products.edit.index')
                                                                                                                </div>
                                                                                                                {{-- <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-primary">Salvar</button>
                                                                                                                </div> --}}
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


    @session("success_update")

        <script>
            Swal.fire({
                title: 'Produto {{ session('success_update') }} com sucesso!',
                icon: 'success',
                width: 400,
                heightAuto: false,
                showConfirmButton: false,
                timer: 5000,
            });
        </script>

    @endsession

    @session("removed")

        <script>
            Swal.fire({
                title: 'Produto {{ session('removed') }} com sucesso!',
                icon: 'success',
                width: 400,
                heightAuto: false,
                showConfirmButton: false,
                timer: 5000,
            });
        </script>

    @endsession

@endsection
