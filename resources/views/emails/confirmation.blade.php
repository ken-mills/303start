@extends('emails.layout')

@section('content')
<div id="content">

    <p>Hello {{$first_name}},</p>

    <p>Thank you for joining the 303start.com mailing list.
    Please click on the button below to confirm your request to join. If you didn't join this list,
    please ignore this message.</p>

    <form action="{{route('api.confirm',['subscription' => $sub ])}}" method="POST">
    {{ method_field('PUT') }}
    <input type="submit" value="Confirm" class="btn-lg btn-primary">
    </form>

    <p style="margin-top:10px">I look forward to providing you with helpful information to make your profession easier.</p>

    <p>--Ken</p>

</div>

@endsection

