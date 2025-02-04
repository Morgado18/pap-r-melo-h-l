
<form action="{{ route('admin.administration.producers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ $user=null }}
    @include('authenticated.__forms.admin.producer.index')
    <button type="submit" class="btn btn-primary mb-3">Salvar</button>
</form>
