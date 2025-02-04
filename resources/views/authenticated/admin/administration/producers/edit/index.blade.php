
<form action="{{ route('admin.administration.producers.update', ['id' => $user->user_id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('authenticated.__forms.admin.producer.index')
    <button type="submit" class="btn btn-primary mb-3">Salvar</button>
</form>
