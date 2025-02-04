
    <div class="form-row align-items-center">
        <div class="col-md-6">
            <label>Nome:</label>
            @error('user_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="text" class="form-control mb-2" placeholder="Nome" required name="user_name" value="{{ old('user_name', isset($user) ? $user->name : '') }}">
        </div>

        <div class="col-md-6">
            <label>Email:</label>
            @error('user_email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="email" class="form-control mb-2" placeholder="Email" required name="user_email"
                value="{{ old('user_email', isset($user) ? $user->email : '') }}" {{ isset($user) ? 'disabled' : '' }}>
        </div>

        <div class="col-md-6">
            <label>Nif:</label>
            @error('user_nif')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="text" class="form-control mb-2" placeholder="Nif" required name="user_nif"
                value="{{ old('user_nif', isset($user) ? $user->nif : '') }}">
        </div>

        <div class="col-md-6">
            <label>Telefone:</label>
            @error('user_phone_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="text" class="form-control mb-2" placeholder="Telefone" required name="user_phone_number"
                value="{{ old('user_phone_number', isset($user) ? $user->phone_number : '') }}">
        </div>

        <div class="col-md-6">
            <label>Nome da empresa (Opcional):</label>
            @error('user_company_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="text" class="form-control mb-2" placeholder="Nome da empresa" required name="user_company_name"
                value="{{ old('user_company_name', isset($user) ? $user->company_name : '') }}">
        </div>

        <div class="col-md-6">
            <label>Endereço:</label>
            @error('user_address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="text" class="form-control mb-2" placeholder="Endereço" required name="user_address"
                value="{{ old('user_address', isset($user) ? $user->address : '') }}">
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Província:</label>
                <select class="form-control" id="sel1" required name="user_province">
                    <option selected disabled>Selecionar uma Província</option>
                    @foreach ($data['provinces'] as $province)
                        <option value="{{ $province->id }}" {{ isset($user) ? ($user->province_id == $province->id) ? "selected" : "" : ""}}>{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <label>Endereço de Referência:</label>
            @error('user_address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <textarea name="user_address_reference" class="form-control mb-2">{{ old('user_address_reference', isset($user) ? $user->address_reference : '') }}</textarea>
        </div>

        <div class="col-md-6">
            <label>Descrição:</label>
            @error('user_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <textarea name="user_description"
                class="form-control mb-2">{{ old('user_description', isset($user) ? $user->description : '') }}</textarea>
        </div>

        <div class="col-md-6">
            @error('user_status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label>Nível de Acesso:</label>
                <select class="form-control" id="sel1" required name="user_status" readonly>
                    <option disabled>Selecionar um Acesso</option>
                    {{-- @foreach ($data['access_levels'] as $access_level) --}}
                    <option selected value="2">Produtor</option>
                        {{-- <option value="{{ $access_level->id }}" {{ isset($user) ? ($user->access_level_id == $access_level->id) ? "selected" : "" : ""}}>{{ $access_level->access }}</option> --}}
                   {{--  @endforeach --}}
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <label>Senha:</label>
            @error('user_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="password" class="form-control mb-2" placeholder="Senha" required name="user_password">
        </div>

    </div>

    @if ($errors->any())
        <script>
            $(document).ready(() => {
                $('#modalCreate').modal('show');
            })
        </script>
    @endif
