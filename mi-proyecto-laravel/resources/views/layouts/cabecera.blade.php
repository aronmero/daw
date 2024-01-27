<div class="cabecera">
    <h1>Bienvenido @if (Auth::user() != null)
            de vuelta,
            {{ Auth::user()->nombre }}
        @endif
    </h1>
    <div class="enlaces">
        @if (Auth::user() != null)
            @include('layouts.navegacion')
            <form action="{{ route('usuarios.logout') }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit">Cerrar Sesion</button>
            </form>
        @else
            <div><a href="{{ route('usuarios.login') }}">Iniciar Sesion</a></div>
        @endif
    </div>
</div>
