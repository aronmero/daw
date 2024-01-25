<script setup>
import { ref } from 'vue';
import Evento from './components/Eventos/Evento.vue'
import RegistroEvento from './components/Eventos/Registro.vue'
import AuthUsuario from './components/AuthUsuario.vue'

let datos = ref("api");
let consulta = async () => {
  return await fetch('https://www.nico.com/eventos')
    .then((response) => response.json())
    .then(response => datos.value = response);
}
consulta();
</script>

<template>
  <RegistroEvento/>
  <AuthUsuario titulo="Iniciar sesion" />
  <AuthUsuario titulo="Crear una nueva cuenta" />

  <div>
    <h1>Eventos</h1>
    <div class="container">
      <Evento v-for="evento in datos.eventos" :lugar="evento.lugar" :fecha="evento.fecha"
        :descripcion="evento.descripcion" :profesores="evento.profesores" :grupos="evento.grupos" />
    </div>
  </div>
</template>

<style scoped>
.container {
  display: flex;
  flex-wrap: wrap;
}
</style>
