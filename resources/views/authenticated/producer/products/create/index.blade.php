
<form action="{{-- {{ route('admin.products.store') }} --}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ $product=null }}
    @include('authenticated.__forms.producer.product.index')
    <button type="submit" class="btn btn-primary mb-3">Salvar</button>
</form>
