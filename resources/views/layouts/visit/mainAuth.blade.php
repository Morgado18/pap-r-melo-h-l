<!DOCTYPE html>
<html lang="pt-ao">

{{-- head --}}

@include('layouts.visit.head')

<body class="bg-light" style="
">

    <main class="main">
        <!-- @morgadomelo -->
        @yield('content')
        <!-- @morgadomelo -->
    </main>

    {{-- ScriptsFooter --}}
    <!-- @morgadomelo -->

    @include('layouts.visit.scriptsFooter')

</body>

</html>
