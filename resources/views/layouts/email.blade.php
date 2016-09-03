<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>

    @include('emails.head')

</head>

<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">

 <tr>
  <td width="260" valign="top">
   <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
     <td>
        <a href="{{route("home")}}" >
          <img src="{{asset('images/303startNoTag.png')}}" alt="303start.com" width="100%" height="140" style="display: block;" />
        </a>
     </td>
    </tr>
   </table>
  </td>
 </tr>

 <tr>
  <td width="600" valign="top" ">
   <table border="0" cellpadding="0" cellspacing="0" width="100%" style=" font-size: large;">
    <tr>
        @yield('content')
    </tr>
   </table>
  </td>
 </tr>

 <tr>
  <td width="600" valign="top">
   <table border="0" cellpadding="0" cellspacing="0" width="100%" style=" font-size: large;">
    <tr>
        @include('emails.footer_left')
    </tr>
   </table>
  </td>
 </tr>

</table>
</body>
</html>

