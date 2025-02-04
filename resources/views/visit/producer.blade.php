@extends('layouts.visit.main')

@section('pageTitle', 'Criar conta - Vendedor/Produtor')

@section('content')

<section id="register-buyer" class="form-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">Criar uma conta [Vendedor/Produtor]</h3>
                <form action="{{ route('store.producer') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nif" class="form-label">Nif do Responsável ou da Empresa*</label>
                        @error('nif')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input type="text" class="form-control" id="nif" name="nif" value="{{ old('nif') }}" >
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="responsible_name" class="form-label">Nome do Responsável (Primeiro e último)*</label>
                            @error('responsible_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <input type="text" class="form-control" id="responsible_name" name="responsible_name" required value="{{ old('responsible_name') }}">

                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email*</label>
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="company_name" class="form-label">Nome da empresa (Opcional)</label>
                            @error('company_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <input type="text" class="form-control" id="company_name" name="company_name" required value="{{ old('company_name') }}">

                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label">Telefone*</label>
                            @error('phone_number')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" required value="{{ old('phone_number') }}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="address" class="form-label">Endereço*</label>
                            @error('address')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <input type="text" class="form-control" id="address" name="address" required value="{{ old('address') }}">

                        </div>
                        <div class="col-md-6">
                            <label for="province" class="form-label">Província*</label>
                            @error('province')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <select name="province" id="province" class="form-control" required>
                                <option selected disabled>Selecione sua Província</option>
                                @foreach ($data['provinces'] as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição da empresa (Opcional)</label>
                        @error('description')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="address_references" class="form-label">Referência do endereço*</label>
                        @error('address_references')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <textarea name="address_reference" id="address_references" class="form-control" required>{{ old('address_references') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        @error('password')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Criar conta</button>
                </form>
            </div>
        </div>
    </div>
</section>

@session("created_producer")

    <script>
        Swal.fire({
            title: '{{ session('created_producer') }} com sucesso!',
            icon: 'success',
            width: 400,
            heightAuto: false,
            showConfirmButton: false,
            timer: 5000,
        });
    </script>

@endsession

@endsection
