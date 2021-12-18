<!DOCTYPE html>
<html lang="ru">
<head>
    @include('admin.classes.head')
</head>
<body>
<div class="app-admin-wrap layout-sidebar-large">
    @include('admin.classes.header')
    @include('admin.classes.sidebar')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        @yield('main')
        @include('admin.classes.footer')
    </div>
   
    <script src="{{ mix('js/admin.js') }}"></script>
    @yield('script')

</div>
</body>
</html>
