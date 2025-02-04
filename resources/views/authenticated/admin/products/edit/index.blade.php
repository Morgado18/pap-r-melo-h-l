
<form action="{{ route('admin.products.update',['slug'=>$product->slug]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('authenticated.__forms.admin.product.index')
    <button type="submit" class="btn btn-primary mb-3">Salvar</button>
</form>
