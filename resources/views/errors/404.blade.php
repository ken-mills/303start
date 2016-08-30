@extends('layouts.simple')

@section('content')

    <p>Sorry, {{$exception->getMessage()}}</p>

    <p>Please email support<a href="mailto:support@303start.com">, support@303start.com</a></p>

    <p style="margin-top:10px">--Ken</p>

@endsection

