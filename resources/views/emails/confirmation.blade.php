@extends('emails.layout')

@section('content')

    <p>Hello {{$first_name}},</p>

    <p>Thank you for joining the 303start.com mailing list.
    Please click on the button below to confirm your request to join. If you didn't join this list,
    please ignore this message.</p>

    <table border="0" cellpadding="0" cellspacing="0" style="background-color:#428bca; border:1px solid #428bca; border-radius:5px;">
        <tr>
            <td align="center" valign="middle" style="color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; letter-spacing:-.5px; line-height:150%; padding-top:15px; padding-right:30px; padding-bottom:15px; padding-left:30px;">
                <a href="{{route('register.confirm',['subscription' => $subscription])}}" target="_blank" style="color:#FFFFFF; text-decoration:none;">Confirm</a>
            </td>
        </tr>
    </table>

    <p style="margin-top:10px">--Ken</p>

@endsection

