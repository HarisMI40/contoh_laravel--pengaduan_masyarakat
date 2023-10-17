<html>
    <head>
        <title>App Name - @yield('title')</title>

        <link rel="stylesheet" href={{asset("/bs/css/bootstrap.min.css")}}>
    </head>
    <body>
   @include('layouts.navbar')

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
