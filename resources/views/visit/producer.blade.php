@extends('layouts.visit.main')

@section('pageTitle', 'Criar conta - Vendedor/Produtor')

@section('content')

<section id="register-buyer" class="form-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">Criar uma conta [Vendedor/Produtor]</h3>
                <form action="register_buyer.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nif do Responsável ou da Empresa*</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nome do Responsável (Primeiro e último)*</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nome da empresa (Opcional)</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Telefone*</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="address" class="form-label">Endereço*</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="col-md-6">
                            <label for="province" class="form-label">Província*</label>
                            <select name="province" id="province" class="form-control" required>
                                <option selected disabled>Selecione sua Província</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Descrição da empresa (Opcional)</label>
                        <textarea name="" id="address_references" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Referência do endereço*</label>
                        <textarea name="" id="address_references" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Criar conta</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
