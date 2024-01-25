<div class="navegacion"> 
    @can('admin.usuario.index')
        <a href="{{ route('profesores.index') }}">Profesores</a>
    @endcan
    <a href="{{ route('actividades.index') }}">Actividades</a>
    <a href="{{ route('grupos.index') }}">Grupos</a>
</div> 