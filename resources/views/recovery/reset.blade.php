<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" value="{{ old('email', $email) }}" readonly>
    <input type="password" name="password" placeholder="Nueva contraseña" required>
    <input type="password" name="password_confirmation" placeholder="Confirmar nueva contraseña" required>
    <button type="submit">Restablecer contraseña</button>
    <button type="button" onclick="confirmLogout()">Volver a Login</button>
</form>

<script>
function confirmLogout() {
    if (confirm("¿Estás seguro de que deseas salir? No se guardarán los cambios.")) {
        window.location.href = "{{ route('login') }}"; // Redirige a la ruta de login
    }
}
</script>