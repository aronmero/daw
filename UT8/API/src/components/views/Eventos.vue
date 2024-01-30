<script setup>
import { ref } from 'vue';
import Evento from '../Eventos/Evento.vue'
import RegistroEvento from '../Eventos/Registro.vue'

defineProps({
    usuario: Object,
})
let datos = ref("api");
let consulta = async () => {
    return await fetch('api/v1/eventos')
        .then((response) => response.json())
        .then(response => datos.value = response);
}
consulta();
</script>
<template>
    <div>
        <h1>Eventos</h1>
        <div class="container">
            <Evento v-for="evento in datos.eventos" :lugar="evento.lugar" :fecha="evento.fecha"
                :descripcion="evento.descripcion" :profesores="evento.profesores" :grupos="evento.grupos" />
        </div>
    </div>
    <template v-if="usuario != null">
        <RegistroEvento />
    </template>
</template>
<style scoped>
.container {

    display: flex;
    flex-wrap: wrap;
}
</style>
