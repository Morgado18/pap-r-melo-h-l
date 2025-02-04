<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprovativo De Pedido-{{ date('d/m/Y', strtotime(now())) }}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        header {
            text-align: center;
            padding: 1.5rem;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="img">
            <img src="imgs/teamwork.png" alt="logo do pdf não carregou!"  width="80" height="55">
        </div>
        <div class="text-center">AGRIFÁCIL</div>
        <div class="text-center">Comprovativo De Pedido</div>
    </header>

    <main>
        <div class="main">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Index</th>
                        <th>Produto</th>
                        <th class="text-center">Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Total</th>
                        <th>Data de encomenda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td class="text-center">{{ $item['quantity'] }}</td>
                            <td>{{ number_format($item['price'], 2, ',', '.') }} Kzs</td>
                            <td>{{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }} Kzs</td>
                            <td>{{ $date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <div class="container" style="font-family: arial, sans-serif;">
        <p class="text-left text-dark"><strong>Cliente:</strong> {{ $user->name }}</p>
        <p class="text-left text-dark"><strong>Método de Pagamento:</strong> {{ $paymentMethod }}</p>
        <p class="text-left text-dark"><strong>Total:</strong> {{ number_format($total, 2, ',', '.') }} Kzs</p>
    </div>

    <hr class="pylarge bg-dark">
    <footer class="col-12 mt-2 text-center" id="footer">

        <small class="text-left text-dark">
            Documento Processado por Computador. <br>
        </small>

    </footer>


</body>

</html>
