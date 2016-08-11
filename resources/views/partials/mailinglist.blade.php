<div id="maillist-app">
   {{csrf_field()}}
    <fan303 base-url="{{url('/')}}" api-token="{{$api_token}}"></fan303>
</div>

<script src = {{asset('js/mailListComp.js')}}></script>
