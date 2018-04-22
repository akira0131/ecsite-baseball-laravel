<!DOCTYPE html>
<!--
この画面は、管理者画面のワイヤーフレーム（Webサイト設計図）になります。
HTMLの各パーツは「layouts」ディレクトリ内から
-->
<html lang="{{ app()->getLocale() }}">

@section('htmlheader')
    @include('components.html_header')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div id="app" v-cloak>
    <div class="wrapper">

    @include('layouts.admin.navbar')

    @include('layouts.admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.admin.content_header')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('layouts.admin.control_sidebar')

    @include('layouts.admin.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('components.js')
    @yield('js')
@show

</body>
</html>
