
@extends('layouts.authenticated.admin.main')

@section('pageTitle', 'Logs de evento')

@section('currentPageTitle')

    Listando Todos os Logs de Evento

@endsection


@section('currentPage', 'Logs de evento')

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="car-header">
                    <div class="row mt-3 container-fluid ">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="get" class="">
                                        <input type="search" name="search" value="{{ request('search') ? request('search') : "" }}"
                                            placeholder="Pesquisar actividade" class="form-control">
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form action="" class="">
                                        <select name="" id="" class="form-control">
                                            <option disabled>Filtrar dados</option>
                                            <option value="show_20" selected>Exibir 20</option>
                                            <option value="show_100">Exibir 100</option>
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
                                    <th>Ip</th>
                                    <th>Nível</th>
                                    <th>Descrição</th>
                                    <th>Criado em</th>
                                </tr>
                            </thead>
                            <tbody style="cursor: pointer;">
                                @foreach ($data['logs'] as $log)

                                    <tr>
                                        <th>{{ $log->id }}</th>
                                        <td>{{ $log->ip }}</td>
                                        <td>{{ $log->level }}</td>
                                        <td>{{ $log->description }}</td>
                                        <td>{{ date('d-m-Y, H:i:s', strtotime($log->created_at)) }}</td>
                                    </tr>

                                @endforeach
                                @if ($data['logs']->isEmpty())
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

@endsection
