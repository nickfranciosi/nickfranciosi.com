<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nick Franciosi | Web Development | Nashville, TN</title>
    <link rel="stylesheet" type="text/css" href="/css/all.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>

    @include('partials.nav')
    
    <div class="container">
        @yield('content')
    </div>


    <script src="/js/all.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>