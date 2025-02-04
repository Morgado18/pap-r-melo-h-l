
<form action="{{ route('admin.administration.buyers.update', ['id'=>$user->user_id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('authenticated.__forms.admin.buyer.index')
    <button type="submit" class="btn btn-primary mb-3">Salvar</button>
</form>
