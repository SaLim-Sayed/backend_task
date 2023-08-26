<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Backend Task</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    {{-- fonts --}}
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    @yield('styles')
    <style>
        body {
            background-color: rgb(166, 200, 196) !important;

        }

        .container {
            background-color: rgb(143, 183, 178) !important;
            min-height: 85vh !important;
            margin-top: 10px;
            margin-bottom: 10px;
            border: 2px solid rgb(30, 70, 117);
            border-radius: 10px;

        }

        .row1 {
            background-color: rgb(197, 230, 226) !important;
            border: 2px solid rgb(30, 70, 117);
            border-radius: 10px
        }


    </style>
</head>

<body>

    {{-- <x-navbar /> --}}

    <div class="container position-relative">
        @yield('content')
    </div>
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('scripts')
</body>

</html>
