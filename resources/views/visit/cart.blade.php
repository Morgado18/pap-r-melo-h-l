@extends('layouts.visit.main')

@section('pageTitle', 'Carrinho de compras')

@section('location1', 'Carrinho de compras')

@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Meu Carrinho</h1>
              <p class="mb-0">
               {{--  Descubra uma ampla variedade de produtos disponíveis para compra! Navegue pelas categorias, encontre itens que atendem
                às suas necessidades, e conecte-se diretamente com produtores confiáveis. --}}
              </p>
                <div class="container">
                    <hr>
                </div>
                <p>
                   {{--  <strong>IBAN:</strong> AO06.0040.0000.5401.5763.1019.4 --}}
                </p>
                @session('pdf_url')
                <a href="{{ session('pdf_url') }}" target="_blank">
                <button class="btn bg-primary text-center text-light">
                    Baixar recibo
                </button>
                </a>
                @endsession
                <div class="container">
                    <hr>
                </div>
            </div>
          </div>
        </div>
      </div>

     {{--  @include('layouts.visit.naviagtion') --}}

    <style>
        .cart-item {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
        }
       /*  .cart-totals {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        margin-top: 20px;
        } */
        .shipping-calculator {
        margin-top: 20px;
        }
        .quantity-control {
        display: flex;
        align-items: center;
        gap: 10px;
        }
       /*  .quantity-control button {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        cursor: pointer;
        }
        .quantity-control input {
        width: 50px;
        text-align: center;
        } */
    </style>

<div class="container mt-5">

{{--     <div class="row border">
        <div class="col-md-4">
            <h5>
                <strong>
                    Produto
                </strong>
            </h5>
        </div>

        <div class="col-md-2">
            <h5>
                <strong>
                    Preço
                </strong>
            </h5>
        </div>
        <div class="col-md-2">
            <h5>
                <strong>
                    Quantidade
                </strong>
            </h5>
        </div>
    </div> --}}

    <style>
        .flex-center{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .quantity-control{
            position: relative;
        }
         .btn-quantity{
            padding: 1rem;
            background: #fff;
             width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
           /*  background-color: #f9f9f9; */
            cursor: pointer;
            transition: 0.5s;
         }
         .btn-quantity:hover{
            background: rgba(236, 74, 25, 0.952);
            color: #ddd;
         }
         .btn-quantity-min{
            position: absolute;
            left: -2.1rem;
         }
         .btn-quantity-plus{
            position: absolute;
            right: -2.1rem;
         }
        .quantity-control input {
             padding: 0.2rem;
            width: 50px;
            text-align: center;
            background-color: #f9f9f9;
        }
        .cart-totals {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            /* padding-left: 1rem; */
            /* margin-top: 20px; */
        }
        .btn-compra{
            padding: 0.5rem;
            border-radius: 25px;
            background: rgba(236, 74, 25, 0.952);
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            font-weight: 700;
            transition: 0.5;

        }
         .btn-compra:hover{
            background: rgba(212, 66, 22, 0.925);
            color: #fff;
        }
    </style>

   {{-- aqui --}}

<div class="container mt-5">
    <div class="row mb-5">
        <!-- Lado Esquerdo: Itens do Carrinho -->
        <div class="col-md-8">
            {{-- Header --}}
            <div class="row border">
                <div class="col-md-4">
                    <h5><strong>Produto</strong></h5>
                </div>
                <div class="col-md-2 flex-center">
                    <h5><strong>Preço</strong></h5>
                </div>
                <div class="col-md-4 flex-center">
                    <h5><strong>Quantidade</strong></h5>
                </div>
                <div class="col-md-2 flex-center">
                    <h5><strong>Total</strong></h5>
                </div>
            </div>
        @if(!empty($cart))
            @foreach ($cart as $item)
                {{-- Item 1 --}}
                <div class="row p-2 border">
                    <div class="col-md-4">
                        <div class="row flex-center">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/products/batatas.jpeg') }}" width="80" height="80"
                                    class="rounded">
                            </div>
                            <div class="col-md-8">
                                <h6>{{ $item['name'] }}</h6>
                                <a href="{{ route('cart.remove', ['productId' => $item['id']]) }}"><button class="btn border bg-warning text-light">Remover</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 flex-center">
                        <p class="price">{{ number_format($item['price'], 2, ',', '.') }} Kzs</p>
                    </div>
                    <div class="col-md-4 flex-center">
                        <div class="quantity-control">
                            <button class="btn-decrease btn-quantity btn-quantity-min">-</button>
                            <input type="text" class="quantity" value="{{ $item['quantity'] }}" readonly>
                            <button class="btn-increase btn-quantity btn-quantity-plus">+</button>
                        </div>
                    </div>
                    <div class="col-md-2 flex-center">
                        <p class="item-total">{{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }} Kzs</p>
                    </div>
                </div>
            @endforeach
        @else
        <br>
            <p class="text-center text-warning">
                <strong>
                    O carrinho está vazio.
                </strong>
            </p>
        @endif
        </div>

        <!-- Lado Direito: Cart Totals -->
        <div class="col-md-4 cart-totals">
            <h4><strong>Compra</strong></h4>
            <span><strong>Subtotal:</strong> <span id="subtotal">6000.00 Kzs</span></span><br>
            <span>......................................................................................</span>
            <p><strong>Envio:</strong> Nenhum método de envio disponível.</p>
            <span><strong>Total:</strong> <span id="total">6000.00 Kzs</span></span> <br>
            <span>......................................................................................</span>

            <div class="shipping-calculator mt-4">
                <h5>Pagamento</h5>
                <form action="@if((count($cart)==0))@else{{ route('buyer.finalizepurchase') }}@endif" method="POST" enctype="multipart/form-data">
                    @csrf

                    @foreach ($cart as $item)
                        <div class="d-none">
                            <input type="hidden" name="cart[{{ $item['id'] }}][id]" value="{{ $item['id'] }}">
                            <input type="hidden" name="cart[{{ $item['id'] }}][name]" value="{{ $item['name'] }}">
                            <input type="hidden" name="cart[{{ $item['id'] }}][price]" value="{{ $item['price'] }}">
                            <input type="hidden" name="cart[{{ $item['id'] }}][quantity]" value="{{ $item['quantity'] }}">
                        </div>
                    @endforeach

                    <div class="mb-3">
                        <select class="form-select" aria-label="Selecione o país" name="payment_method" required id="inpPayment">
                            <option selected disabled>Selecione um método de pagamento</option>
                            <option value="Transferência Bancaria" disabled>Transferência Bancaria por IBAN - Apenas App EXPRESS</option>
                            <option value="Pagamento na Entrega" selected>Pagamento na Entrega</option>
                        </select>
                    </div>
                    <div class="mb-3" id="inpFile">

                    </div>
                    <button type="submit" class="btn btn-compra w-100" {{ (count($cart)==0) ? "disabled" : "" }}>Finalizar Compra</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
{{-- <script>
    $(document).ready(function () {
        // Função para atualizar o total de um item
        function updateItemTotal(item) {
            const price = parseFloat(item.find('.price').text().replace(' Kzs', ''));
            const quantity = parseInt(item.find('.quantity').val());
            const total = price * quantity;
            item.find('.item-total').text(total.toFixed(2) + ' Kzs');
            updateCartTotals();
        }

        // Função para atualizar o subtotal e o total do carrinho
        function updateCartTotals() {
            let subtotal = 0;
            $('.row.p-2.border').each(function () {
                const itemTotal = parseFloat($(this).find('.item-total').text().replace(' Kzs', ''));
                subtotal += itemTotal;
            });
            $('#subtotal').text(subtotal.toFixed(2) + ' Kzs');
            $('#total').text(subtotal.toFixed(2) + ' Kzs'); // Subtotal = Total (sem envio)
        }

        // Incrementar quantidade
        $('.btn-increase').click(function (e) {
            e.preventDefault();
            const input = $(this).siblings('.quantity');
            let quantity = parseInt(input.val());
            quantity += 1;
            input.val(quantity);
            updateItemTotal($(this).closest('.row.p-2.border'));
        });

        // Decrementar quantidade
        $('.btn-decrease').click(function (e) {
            e.preventDefault();
            const input = $(this).siblings('.quantity');
            let quantity = parseInt(input.val());
            if (quantity > 1) {
                quantity -= 1;
                input.val(quantity);
                updateItemTotal($(this).closest('.row.p-2.border'));
            }
        });

        // Atualizar totais ao carregar a página
        updateCartTotals();
    });
</script> --}}

<script>
    $('#inpPayment')
    $(document).ready(function () {

        $('#inpPayment').change(function () {
            const selectedValue = $(this).val();
            if (selectedValue === '1') {
                $('#inpFile').html('');
                $('#inpFile').append(`
                    <label>Faça upload do comprovativo (gerado pelo App Express)*<label>
                    <input type="file" class="form-control">
                `);
            } else {
                $('#inpFile').html('');
            }
        });

            // Função para formatar números (remove pontos e substitui vírgula por ponto)
            function parseNumber(value) {
                return parseFloat(value.replace(' Kzs', '').replace(/\./g, '').replace(',', '.'));
            }

            // Função para formatar números no formato de exibição (com pontos e vírgula)
            function formatNumber(value) {
                return value.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' Kzs';
            }

            // Função para atualizar o total de um item
            function updateItemTotal(item) {
                const price = parseNumber(item.find('.price').text()); // Obtém o preço unitário
                const quantity = parseInt(item.find('.quantity').val()); // Obtém a nova quantidade
                const total = price * quantity; // Calcula o total (preço unitário * quantidade)
                item.find('.item-total').text(formatNumber(total)); // Atualiza o total formatado
                updateCartTotals(); // Atualiza os totais do carrinho
            }

            // Função para atualizar o subtotal e o total do carrinho
            function updateCartTotals() {
                let subtotal = 0;
                $('.row.p-2.border').each(function () {
                    const itemTotal = parseNumber($(this).find('.item-total').text()); // Obtém o total de cada item
                    subtotal += itemTotal; // Soma ao subtotal
                });
                $('#subtotal').text(formatNumber(subtotal)); // Atualiza o subtotal formatado
                $('#total').text(formatNumber(subtotal)); // Atualiza o total formatado (subtotal = total, sem envio)
            }

            // Incrementar quantidade
            $('.btn-increase').click(function (e) {
                e.preventDefault();
                const input = $(this).siblings('.quantity');
                let quantity = parseInt(input.val());
                quantity += 1; // Incrementa a quantidade
                input.val(quantity);
                updateItemTotal($(this).closest('.row.p-2.border')); // Atualiza o total do item
            });

            // Decrementar quantidade
            $('.btn-decrease').click(function (e) {
                e.preventDefault();
                const input = $(this).siblings('.quantity');
                let quantity = parseInt(input.val());
                if (quantity > 1) {
                    quantity -= 1; // Decrementa a quantidade
                    input.val(quantity);
                    updateItemTotal($(this).closest('.row.p-2.border')); // Atualiza o total do item
                }
            });

            // Atualizar totais ao carregar a página
            updateCartTotals();
        });
</script>

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
