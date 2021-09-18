<!DOCTYPE html>
<html lang="en">
<head>

    @include('backend.layout.head')

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('backend.layout.navbar')

    @include('backend.layout.sidebar')

    @yield('content')

</div>

@include('backend.layout.footer')

</body>

</html>
