@auth
<form style="display: inline;" action="/logout" method="POST">
    @csrf
    <a href="#" onclick="this.closest('form').submit()">Logout</a>
</form>
@else
<a href="/login">Login</a>
@endauth

@if(session('status'))
   <br>
   {{ session('status') }}
@endif