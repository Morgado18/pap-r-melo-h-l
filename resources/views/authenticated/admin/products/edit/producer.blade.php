<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @include('authenticated.__forms.admin.producer.index')
    <button type="submit" class="btn btn-primary mb-3">Salvar</button>
</form>
