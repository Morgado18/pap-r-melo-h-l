<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>
                @yield('currentPageTitle')
            </h4>
            <p class="mb-0">Painel Administrativo</p>
        </div>
    </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Painel Administrativo</a></li>
            <li class="breadcrumb-item active"><a href="#" class="text-muted">@yield('currentPage')</a></li>
        </ol>
    </div>
</div>
