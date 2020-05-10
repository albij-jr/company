<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Company | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    @yield('css')

</head>
<body>
    @include('layouts.partials.sidebar')
    @include('layouts.partials.header')
    <main>
        @yield('content')
    </main>

    <div class="loader">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
        </div>
        <div class="loading-text">Loading</div>
    </div>

    @include('layouts.partials.footer')
    <script src="{{ asset('assets/bootstrap/js/jquery.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(() => {
            let route="dashboard";
            @yield('current-route')
            $(`.nav-item.side[data-link=${route}]`).addClass('active');
            setTimeout(() => {
                $(".loader").fadeOut();
            }, 2000);
        })
    </script>
    @yield('script')
</body>
</html>
