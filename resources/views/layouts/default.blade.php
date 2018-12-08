<!DOCTYPE html>
<html>
@include('layouts.head')
<body>
    <div id="container">
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
    </div>
</body>
</html>