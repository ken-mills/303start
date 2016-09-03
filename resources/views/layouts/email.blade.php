<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>

    @include('emails.head')

</head>

<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-family: sans-serif; font-size: large;">

 <tr style="width: 260px;">
  <td>
   <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
     <td style="width: 260px;" valign="top">
        @include('emails.banner')
     </td>
    </tr>
   </table>
  </td>
 </tr>

 <tr>
  <td style="width:600px" valign="top">
   <table border="0" cellpadding="0" cellspacing="0" width="100%" >
    <tr>
     <td>
        @yield('content')
     </td>
    </tr>
   </table>
  </td>
 </tr>

 <tr>
  <td style="width:600px" valign="top">
   <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
    <td>
        @include('emails.footer_left')
    </td>
    </tr>
   </table>
  </td>
 </tr>

</table>
</body>
</html>

