<div id="maillist-app">
   {{csrf_field()}}
   {{route('fan.store')}}
    <fan303 base-url="{{url('/')}}"></fan303>
</div>

<script src = {{asset('js/mailListComp.js')}}></script>