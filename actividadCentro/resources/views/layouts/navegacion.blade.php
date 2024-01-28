<div class="navegacion"> 
    @can('admin.usuario.index')
        <a href="{{ route('profesores.index') }}" class="{{ request()->routeIs('profesores.*') ? 'activo':'' }} ">Profesores</a>
    @endcan

    <a href="{{ route('actividades.index') }}" class="{{ request()->routeIs('actividades.*') ? 'activo':'' }} ">Actividades</a>
    <a href="{{ route('grupos.index') }}" class="{{ request()->routeIs('grupos.*') ? 'activo':'' }} ">Grupos</a>
</div> 