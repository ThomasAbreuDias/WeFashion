@if(Session::has('message'))
<div class="alert alert-primary" role="alert">
    <p>{{Session::get('message')}}</p>
</div>
@endif