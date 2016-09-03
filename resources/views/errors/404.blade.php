@extends('layouts.simple')

@section('content')

    @if($exception->getMessage())
        <p>Sorry, {{$exception->getMessage()}}</p>
    @else
        <p>Sorry, Error 404: The page you are looking for could not be found.</p>
    @endif

    <p style="margin-top:10px">--Ken</p>

    @include('partials.support')

@endsection

