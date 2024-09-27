
<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <input type="email" name="email" id="" placeholder="correo">
    <button type="submit">Reestablecer</button>
</form>