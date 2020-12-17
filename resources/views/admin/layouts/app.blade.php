<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.head')

<body>
    @include('admin.layouts.navbar')
    <div class="wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    @include('admin.layouts.footer')
    @include('admin.layouts.script')
</body>

</html>