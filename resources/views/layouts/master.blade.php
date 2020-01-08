<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MeMart</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css')  }}">
    @stack('css')
</head>
<body>

@include('layouts.partials.modal')

@yield('content')

@include('layouts.partials.footer')

<script src="{{ asset('js/app.js')  }}"></script>
<script src="{{ asset('js/swal.js')  }}"></script>
<script src="{{ asset('vendor/ChartJS/Chart.min.js') }}"></script>
<script src="{{ asset('js/script.js')  }}"></script>
@stack('js')
</body>
</html>
