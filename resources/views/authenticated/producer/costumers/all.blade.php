@extends('layouts.authenticated.producer.main')

@section('location2', 'Todos os meus Clientes')

@section('title', 'Todos os meus Clientes')

@section('content')

<style>
    td{
        font-size: 15px;
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
                    <div class="row mt-3 container-fluid my-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="get" class="">
                                        <input type="search" name="search" value="{{ request('search') ? request('search') : "" }}"
                                            placeholder="Pesquisar Clientes" class="form-control" {{-- {{ ($data['costumers']->isEmpty()) ? "disabled" : "" }} --}}>
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
                                    <th>Index</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Contacto</th>
                                    <th>Pedidos</th>
                                    {{-- <th>
                                        <center>
                                            Info
                                        </center>
                                    </th>
                                    <th>Cadastrado em</th>
                                    <th>
                                        <center>
                                            Opções
                                        </center>
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody style="cursor: pointer;">
                               {{--  @foreach ($data['products'] as $product)

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
                                                <button class="btn border dropdown-toggl" data-toggle="dropdown">
                                                    <i class="bi bi-arrow-down"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#modalEdit{{ $product->id }}" data-toggle="modal" data-target="#modalEdit{{ $product->id }}">Editar</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{ route('admin.products.remove', ['slug' => $product->slug]) }}">Remover</a>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>

                                @endforeach
                                @if ($data['costumers']->isEmpty())
                                    <tr>
                                        <td colspan="13" class="text-warning text-center">
                                            Nenhum registo encontrado!
                                        </td>
                                    </tr>
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </section>

    {{-- @session("success")

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

    @endsession --}}

@endsection
