<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    {{--<link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
    <div class="container">
            @yield('content')
    </div>
</body>
</html>