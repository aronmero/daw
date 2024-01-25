<div class="cabecera">
    <h1>Bienvenido @if (Auth::user() != null)
            de vuelta,
            {{ Auth::user()->nombre }}
        @endif
    </h1>
    <div>
        @if (Auth::user() != null)
            <form action="{{ route('usuarios.logout') }}" method="POST">
                @csrf
                @method('POST')
                <input type="submit" value="Cerrar Sesion">
            </form>
        @else
            <div><a href="{{ route('usuarios.login') }}">Iniciar Sesion</a></div>
        @endif
    </div>
</div>
