<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layout.title-meta')
    @include('layout.head')
</head>

<body>
<div id="init-vue">
    <div>
        @include('layout.topbar')
        @include('layout.sidebar')
    </div>
    <div id="layout-wrapper" class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layout.footer')
    </div>

    @include('layout.right-sidebar')
<!-- /Right-bar -->
</div>
<!-- JAVASCRIPT -->
@include('layout.vendor-scripts')
</body>
</html>
