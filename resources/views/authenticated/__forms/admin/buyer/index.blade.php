
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

        <div class="col-md-12">
            @error('user_province')
                <span class="text-danger">{{ $message }}</span>
            @enderror
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

        <div class="col-md-12">
            <label>Endereço default:</label>
            @error('user_default_address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <textarea name="user_default_address" class="form-control mb-2">{{ old('user_default_address', isset($user) ? $user->default_address : '') }}</textarea>
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
                    <option selected value="3">Comprador</option>
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
