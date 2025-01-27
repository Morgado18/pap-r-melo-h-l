<!DOCTYPE html>
<html lang="pt-ao">

{{-- head --}}

@include('layouts.visit.head')

<body
    @if(Route::is('pageMain'))
        class="index-page"
    @else
        class="blog-page"
    @endif
>

    {{-- header --}}

    @include('layouts.visit.header')

  <main class="main">
    <!-- @morgadomelo -->
    @yield('content')
    <!-- @morgadomelo -->
  </main>

  {{-- footer --}}

    @include('layouts.visit.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  {{-- ScriptsFooter --}}
  <!-- @morgadomelo -->

  @include('layouts.visit.scriptsFooter')

</body>

</html>
