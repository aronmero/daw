<script setup>
import { ref } from 'vue';
import Evento from './components/Evento.vue'

let datos = ref("test");
let consulta = async () => {
  return await fetch('https://www.nico.com/eventos')
    .then((response) => response.json())
    .then(response => datos.value = response);
}
consulta();
</script>

<template>
  <h1>Eventos</h1>
  <div class="container">
    <Evento v-for="evento in datos.eventos" :lugar="evento.lugar" :fecha="evento.fecha" :descripcion="evento.descripcion"
      :profesores="evento.profesores" :grupos="evento.grupos">
    </Evento>
  </div>
</template>

<style scoped>
.container {
  display: flex;
  flex-wrap: wrap;
}
</style>
