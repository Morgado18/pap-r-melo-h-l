@extends('layouts.authenticated.producer.main')

@section('location2', 'Todos os Produtos')

@section('title', 'Todos os Produtos')

@section('content')

<style>
    td{
        font-size: 15px;/*
        font-weight: 900, */
    }
    th{
        color: gray
    }
</style>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                 <div class="card">
                <div class="car-header">
                    {{-- <h4 class="card-title">Table Bordered</h4> --}}
                    <div class="row mt-3 container-fluid my-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="get" class="">
                                        <input type="search" name="search" value="{{ request('search') ? request('search') : "" }}"
                                            placeholder="Pesquisar produto" class="form-control" {{ ($data['products']->isEmpty()) ? "disabled" : "" }}>
                                    </form>
                                </div>{{--
                                <div class="col-md-6">
                                    <form action="" class="">
                                        <select name="" id="" class="form-control" {{ ($data['products']->isEmpty()) ? "disabled" : "" }}>
                                            <option disabled>Filtrar produtos</option>
                                            <option value="show_5" selected>Exibir 5</option>
                                            <option value="show_50">Exibir 50</option>
                                            <option value="show_all">Exibir todos</option>
                                        </select>
                                    </form>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-6" style="display:flex; justify-content: flex-end;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                                Cadastrar
                                <i class="fa-solid fa-plus"></i>
                            </button>
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
                                                                                                                bg-success
                                                                                                            @elseif ($product->status == "Pendente" || $product->status == "Inativo" || $product->status == "Indisponível")
                                                                                                                bg-warning
                                                                                                            @elseif ($product->status == "Esgotado")
                                                                                                                bg-danger
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
                                                                                                        <td>
                                                                                                            <center>
                                                                                                                <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#modalMoreInfoProduct{{ $product->id }}">
                                                                                                                    <i class="bi bi-plus-circle"></i>
                                                                                                                </button>
                                                                                                            </center>
                                                                                                        </td>
                                                                                                        <td class="color-danger">{{ date('d-m-Y, H:i', strtotime($product->created_at)) }}</td>
                                                                                                        <td>
                                                                                                            <center>
                                                                                                                <button type="button" class="border btn dropdown-toggl" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                                    <i class="bi bi-arrow-down"></i>
                                                                                                                </button>
                                                                                                                    <ul class="dropdown-menu">
                                                                                                                        <a class="dropdown-item" href="#modalEdit{{ $product->id }}" data-toggle="modal"
                                                                                                                            data-target="#modalEdit{{ $product->id }}">Editar</a>
                                                                                                                        <div class="dropdown-divider"></div>
                                                                                                                        <a class="dropdown-item" href="{{ route('admin.products.remove', ['slug' => $product->slug]) }}">Remover</a>
                                                                                                                    </ul>
                                                                                                                {{-- </div> --}}
                                                                                                            </center>
                                                                                                        </td>
                                                                                                    </tr>

                                                                                                    <!-- modalMoreInfoProduct -->
                                                                                                    <div class="modal fade" id="modalMoreInfoProduct{{ $product->id }}">
                                                                                                        <div class="modal-dialog modal-l" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    <h5 class="modal-title">Mais informações do Produto</h5>
                                                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                                                                                                                <img class="d-block w-100" height="300"
                                                                                                                                                    src="{{ asset('storage/products/batatas.jpeg') }}" alt="First slide">
                                                                                                                                            </div>
                                                                                                                                            <div class="carousel-item">
                                                                                                                                                <img class="d-block w-100" height="300"
                                                                                                                                                    src="{{ asset('storage/products/cenoura.jpeg') }}" alt="Second slide">
                                                                                                                                            </div>
                                                                                                                                            <div class="carousel-item">
                                                                                                                                                <img class="d-block w-100" height="300"
                                                                                                                                                    src="{{ asset('storage/products/batatas.jpeg') }}" alt="Third slide">
                                                                                                                                            </div>
                                                                                                                                        </div><a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                                                                                                            data-slide="prev"><span class="carousel-control-prev-icon"></span> <span
                                                                                                                                                class="sr-only">Previous</span> </a><a class="carousel-control-next"
                                                                                                                                            href="#carouselExampleIndicators" data-slide="next"><span
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
                                                                                                                    {{--   @include('authenticated.admin.products.edit.index') --}}
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
    </section>


<!-- Modal create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('authenticated.producer.products.create.index')
            </div>
        </div>
    </div>
</div>

    @session("success")

        <script>
            Swal.fire({
                title: '{{ session('success') }}',
                icon: 'success',
                width: 400,
                heightAuto: false,
                showConfirmButton: false,
                timer: 5000,
            });
        </script>

    @endsession

@endsection
