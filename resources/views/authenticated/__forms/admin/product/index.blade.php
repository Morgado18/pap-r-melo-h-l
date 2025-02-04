
    <div class="form-row align-items-center">
        <div class="col-md-6">
            <label class="sr-only">Nome</label>
            @error('product_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="text" class="form-control mb-2" placeholder="Nome" required name="product_name" value="{{ old('product_name', isset($product) ? $product->name : '') }}">
        </div>

        <div class="col-md-6">
            @error('product_price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Kzs</span>
                </div>
                <input type="text" class="form-control" placeholder="Preço" required name="product_price" value="{{ old('product_price', isset($product) ? $product->price : '') }}">
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <label class="sr-only">Quant. em Stock</label>
            @error('product_quant_stock')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="number" class="form-control mb-2" placeholder="Quant. em Stock" required name="product_quant_stock" value="{{ old('product_quant_stock', isset($product) ? $product->quantity : '') }}">
        </div>

        <div class="col-md-6">
            <label class="sr-only">Quant. min para compra</label>
            @error('product_quant_min_buy')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="number" class="form-control mb-2" placeholder="Quant. min para compra" required name="product_quant_min_buy" value="{{ old('product_quant_min_buy', isset($product) ? $product->min_quant_to_buy : '') }}">
        </div>

        <div class="col-md-6">
            @error('product_status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label>Estado do Produto:</label>
                <select class="form-control" id="sel1" required name="product_status">
                    <option selected disabled>Selecionar um Estado</option>
                    @foreach ($data['product_status'] as $product_status)
                        <option value="{{ $product_status->id }}" {{ isset($product) ? ($product->product_status_id == $product_status->id) ? "selected" : "" : ""}}>{{ $product_status->status }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            @error('product_producer')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label>Produtor:</label>
                <select class="form-control" id="sel1" required name="product_producer">
                    <option selected disabled>Selecionar um Produtor</option>
                    @foreach ($data['producers'] as $producer)
                        <option value="{{ $producer->producer_id }}" {{ isset($product) ? ($product->producer_id == $producer->producer_id) ? "selected" : "" : ""}}>{{ $producer->producer_id }}-{{ $producer->producer_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-12">
            @error('product_category')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label>Categoria:</label>
                <select class="form-control" id="sel1" required name="product_category">
                    <option selected disabled>Selecionar uma categoria</option>
                    @foreach ($data['categories'] as $category)
                        <option value="{{ $category->id }}" {{ isset($product) ? ($product->product_category_id == $category->id) ? "selected" : "" : ""}}>{{-- {{ $category->id }}- --}}{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-12">
            @error('product_img')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <label>Imagem/Imagens:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" required multiple name="product_img[]" {{ isset($product) ? "disabled" : "" }}>
                    <label class="custom-file-label">Selecionar imagem 1</label>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            @error('product_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group mb-3">
                <label>Descrição:</label>
                <textarea class="form-control" rows="4" id="comment" name="product_description">{{ old('product_description', isset($product) ? $product->description : '') }}</textarea>
            </div>
        </div>

       {{--  <div class="col-md-12">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="product_img2">
                    <label class="custom-file-label">Selecionar imagem 2</label>
                </div>
            </div>
        </div>

        <div class="col-md-12">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="product_img3">
                    <label class="custom-file-label">Selecionar imagem 3</label>
                </div>
            </div>
        </div> --}}
    </div>

    @if ($errors->any())
        <script>
            $(document).ready(() => {
                $('#modalCreate').modal('show');
            })
        </script>
    @endif
