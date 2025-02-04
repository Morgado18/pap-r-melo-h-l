@extends('layouts.authenticated.admin.main')

@section('pageTitle', 'Todos os Utilizadores')

@section('currentPageTitle')

Listando Todos os Utilizadores

@endsection


@section('currentPage', 'Todos Utilizadores')

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
                                    <input type="search" name="search"
                                        value="{{ request('search') ? request('search') : "" }}"
                                        placeholder="Pesquisar utilizador" class="form-control" {{ ($data['users']->isEmpty()) ? "disabled" : "" }}>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="" class="">
                                    <select name="" id="" class="form-control" {{ ($data['users']->isEmpty()) ? "disabled" : "" }}>
                                        <option disabled>Filtrar produtos</option>
                                        <option value="show_5" selected>Exibir 5</option>
                                        <option value="show_50">Exibir 50</option>
                                        <option value="show_all">Exibir todos</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="display:flex; justify-content: flex-end;">
                        {{-- <div class="row">
                            <div class="col-md-8">
                                <form action="" class="">
                                    <input type="search" placeholder="Pesquisar produto" class="form-control">
                                </form>
                            </div>
                            <div class="col-md-4"> --}}
                                <button class="btn bg-primary" data-toggle="modal" data-target="#modalCreate">
                                    Cadastrar Administrador
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                                {{--
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-responsive-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Nif</th>
                                <th>Nível de Acesso</th>
                                <th>Cadastrado em</th>
                                <th class="text-center">
                                    Opções
                                </th>
                            </tr>
                        </thead>
                        <tbody style="cursor: pointer;">
                            @foreach ($data['users'] as $user)

                                <tr>
                                    <th>{{ $user->user_id }}</th>
                                    <td>
                                        <center>
                                            <img src="{{ asset('imgs/unknown.jpg') }}" class="rounded-pill" width="35" height="35" alt="Img do user não carregou">
                                        </center>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->producer_phone ?? $user->buyer_phone ?? '-----' }}</td>
                                    <td>{{ $user->producer_nif ?? $user->buyer_nif ?? '-----' }}</td>
                                    <td>{{ $user->access_level }}</td>
                                    <td class="color-danger">{{ date('d-m-Y, H:i', strtotime($user->created_at)) }}</td>
                                    <td>
                                        <center>
                                            <button class="btn border dropdown-toggl" data-toggle="dropdown">
                                                <i class="fa-solid fa-arrow-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if ($user->access_level_id == 1)
                                                <a class="dropdown-item" href="#modalEdit{{ $user->id }}"
                                                    data-toggle="modal"
                                                    data-target="#modalEdit{{ $user->id }}">Editar</a>

                                                <div class="dropdown-divider"></div>@endif
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.administration.users.remove', ['id' => $user->id]) }}">Remover</a>
                                            </div>
                                        </center>
                                    </td>
                                </tr>

                                <!-- Modal edit -->
                                <div class="modal fade" id="modalEdit{{ $user->id }}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Utilizador</h5>
                                                <button type="button" class="close"
                                                    data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               {{--  @if ($user->access_level_id == 1) --}}
                                                    @include('authenticated.admin.administration.users.edit.index')
                                                   {{--  @elseif ($user->access_level_id == 2)
                                                        @include('authenticated.admin.administration.producers.edit.index')
                                                @endif --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            @if ($data['users']->isEmpty())
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

<!-- Modal create -->
<div class="modal fade" id="modalCreate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Administrador</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('authenticated.admin.administration.users.create.index')
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-primary">Salvar</button>
            </div> --}}
        </div>
    </div>
</div>

@session("success")

    <script>
        Swal.fire({
            title: 'Utilizador {{ session('success') }} com sucesso!',
            icon: 'success',
            width: 400,
            heightAuto: false,
            showConfirmButton: false,
            timer: 5000,
        });
    </script>

@endsession

@session("updated")

    <script>
        Swal.fire({
            title: 'Utilizador {{ session('updated') }} com sucesso!',
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
            title: 'Utilizador {{ session('removed') }} com sucesso!',
            icon: 'success',
            width: 400,
            heightAuto: false,
            showConfirmButton: false,
            timer: 5000,
        });
    </script>

@endsession

@endsection
