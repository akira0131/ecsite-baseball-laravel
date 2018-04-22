<!DOCTYPE html>
<html>

@include('components.html_header')
<body>
    <div id="app" v-cloak>
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section>
    </div>
    @section('scripts')
        @include('components.js')
    @show
</body>
</html>
