<!DOCTYPE html>
<html lang="en">

<head>

    @include('head')

    <link rel="stylesheet" href="{{asset('css/default_email.css')}}">


</head>

<body>

    <div id="header" class="container">

        @include('emails.banner')

    </div>


    <div id="content" class="container">

        @yield('content')

    </div>

</body>
</html>

