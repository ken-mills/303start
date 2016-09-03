@extends('layouts.simple')

@section('content')

    <p>
        Thank you {{$user->first_name}} for joining the 303start.com mailing list.
        Your email address has been confirmed.
    </p>

    <p>
        I look forward to providing you with helpful information and services to
        hopefully make you more effective at your profession.
    </p>

    <p>--Ken</p>

    @include('partials.support')

@endsection

