<!DOCTYPE html>
<html lang="en">

<head>

    @include('partials.head')

    <link rel="stylesheet" href="{{asset('css/default_simple.css')}}">


</head>

<body>

    <div id="header" class="container">

        @include('partials.banner')

    </div>


    <div id="content" class="container">

        @yield('content')

    </div>

    @include('partials.google')

</body>
</html>

