@extends('layouts.authenticated.producer.main')

@section('location2', 'Todos os Pedidos')

@section('title', 'Todos os Pedidos')

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
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="get">
                                    <input type="search" class="form-control" name="search" placeholder="Pesquisar" value="{{ request('search') }}">
                                </form>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center text-muted">Index</th>
                                    <th scope="col" class="text-muted">Comprador</th>
                                    <th scope="col" class="text-muted"><center>Status</center></th>
                                    <th scope="col" class="text-muted"><center>Forma de Pag.</center></th>
                                    <th scope="col" class="text-muted"><center>Produtos</center></th>
                                    <th scope="col" class="text-muted"><center>Total</center></th>
                                    <th scope="col" class="text-muted" title="Comprovativo de pedido" class="text-center"><center>C.PD<c/enter></th>
                                    <th scope="col" class="text-muted" title="Comprovativo de pagamento" class="text-center"><center>C.PM</center></th>
                                    <th scope="col" class="text-muted">
                                        <center>INFO</center>
                                    </th>
                                    <th scope="col" class="text-muted"><center>Efectuado em</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['orders'] as $order)

                                    <tr>
                                        <th scope="row" class="text-center">{{ $loop->index + 1 }}</th>
                                        <td>{{ $order->user_name }}</td>
                                        <td>
                                            <center>
                                            @if ($order->order_status == "Processando")
                                                <span class="bg-primary text-center text-light">{{ $order->order_status }}</span>
                                                @elseif ($order->order_status == "Enviando")
                                                <span class="bg-warning text-center text-light">{{ $order->order_status }}</span>
                                                @elseif ($order->order_status == "Concluído")
                                                <span class="bg-success text-center text-light">{{ $order->order_status }}</span>
                                                @elseif ($order->order_status == "Cancelado")
                                                    <span class="bg-danger text-center text-light">{{ $order->order_status }}</span>
                                                @endif
                                            </center>
                                        </td>
                                        <td><center>{{ $order->payment_method }}</center></td>
                                        <td><center>{{ $order->product_count }}</center></td>
                                        <td><center>{{ number_format($order->order_total, '2', ',', '.') }}Kzs</center></td>
                                        <td>
                                            <center>
                                                <a href="{{ asset($order->order_proof_path) }}" target="_blank">
                                                    <button class="btn border">
                                                        <i class="bi-eye"></i>
                                                    </button>
                                                </a>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <button class="btn border">
                                                    <i class="bi-eye"></i>
                                                </button>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="#">
                                                    <button class="btn border" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#moreInfo{{ $order->order_id }}">
                                                        <i class="bi-plus-circle"></i>
                                                    </button>
                                                </a>
                                            </center>
                                        </td>
                                        <td><center>{{ date('d/m/Y, H:i', strtotime($order->created_at)) }}</center></td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="moreInfo{{ $order->order_id }}" tabindex="-1" aria-labelledby="moreInfo{{ $order->order_id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="moreInfo{{ $order->order_id }}Label">Mais informações</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                           {{--  <ul>
                                                                <li>
                                                                    <strong>Comprador:</strong> {{ $order->user_name }}
                                                                </li>
                                                            </ul> --}}
                                                            <p>
                                                                <strong>Comprador:</strong> {{ $order->user_name }}
                                                            </p>
                                                            <p>
                                                                <strong>Email do Comprador:</strong> {{ $order->user_email }}
                                                            </p>
                                                            <p>
                                                                <strong>Contacto do Comprador:</strong> {{ $order->phone_number }}
                                                            </p>
                                                            <p>
                                                                <strong>Endereço do Comprador:</strong> {{ $order->default_address }}
                                                            </p>
                                                            <p>
                                                                <strong>Data:</strong> {{  date('d/m/Y, H:i', strtotime($order->created_at)) }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>
                                                                <strong>Status:</strong>
                                                                @if ($order->order_status == "Processando")
                                                                    <span class="bg-primary text-center text-light">{{ $order->order_status }}</span>
                                                                    @elseif ($order->order_status == "Enviando")
                                                                    <span class="bg-warning text-center text-light">{{ $order->order_status }}</span>
                                                                    @elseif ($order->order_status == "Concluído")
                                                                    <span class="bg-success text-center text-light">{{ $order->order_status }}</span>
                                                                    @elseif ($order->order_status == "Cancelado")
                                                                        <span class="bg-danger text-center text-light">{{ $order->order_status }}</span>
                                                                    @endif
                                                            </p>
                                                            <p>
                                                                <strong>F.Pagamento:</strong> {{ $order->payment_method }}
                                                            </p>
                                                            <p>
                                                                <strong>Produtos Requisitado:</strong> {{ $order->product_count }}
                                                            </p>
                                                            <p><strong>Produtos-Quantidade requisitado:</strong></p>
                                                            <ol type="a">
                                                                <li>Batata-2</li>
                                                                <li>Feijão-1</li>
                                                            </ol>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <hr>
                                                            <p>
                                                                <strong>Total:</strong> {{ number_format($order->order_total, '2', ',', '.') }}Kzs
                                                            </p>
                                                            <hr>
                                                        </div>
                                                       <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <a href="{{ route('producer.mark_as', ['status' => 'sending', 'orderId' => $order->order_id]) }}"><button class="btn bg-warning p-2 text-center text-light w-100">Marcar como Enviando</button></a>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <a href="{{ route('producer.mark_as', ['status' => 'done', 'orderId' => $order->order_id]) }}"><button class="btn bg-success p-2 text-center text-light w-100">Marcar como Concluído</button></a>
                                                            </div><div class="col-md-6 mb-2">
                                                                <a href="{{ route('producer.mark_as', ['status' => 'canceled', 'orderId' => $order->order_id]) }}"><button class="btn bg-danger p-2 text-center text-light w-100">Cancelar</button></a>
                                                            </div>
                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="">Iniciar conversa</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>


            </div>
        </div>
    </section>

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
