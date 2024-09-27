<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Correo" required>
    <button type="submit">Reestablecer</button>

    <a href="{{ route('login') }}">Volver al Login</a>
</form>

@if (session('status'))
    <div id="status-message">
        {{ session('status') }}
        <p>
            Por favor, revisa tu <strong>correo registrado</strong> 
            y haz clic en el siguiente botón para abrir tu cliente de correo:
        </p>
        <button onclick="redirectToOutlook()">
            Abrir Correo
        </button>
    </div>
@endif

<script>
function redirectToOutlook() {
    const email = "{{ session('email') }}";
    // Redirigir a Outlook
    const outlookUrl = `https://outlook.live.com/mail/0/inbox?view=all&to=${email}`;
    window.open(outlookUrl, '_blank');
}
</script>