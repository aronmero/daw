<div class="navegacion"> 
    @can('admin.usuario.index')
        <a href="{{ route('profesores.index') }}" class="{{ request()->routeIs('profesores.index') ? 'activo':'' }} ">Profesores</a>
    @endcan

    <a href="{{ route('actividades.index') }}" class="{{ request()->routeIs('actividades.index') ? 'activo':'' }} ">Actividades</a>
    <a href="{{ route('grupos.index') }}" class="{{ request()->routeIs('grupos.index') ? 'activo':'' }} ">Grupos</a>
</div> 