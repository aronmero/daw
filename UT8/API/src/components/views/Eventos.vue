<script setup>
import { ref } from "vue";
import Evento from "../Eventos/Evento.vue";
import RegistroEvento from "../Eventos/Registro.vue";

defineProps({
  usuario: Object,
});

let datos = ref("api");
let mostrarRegistro = ref(false);

let consulta = async () => {
  return await fetch("api/v1/eventos")
    .then((response) => response.json())
    .then((response) => (datos.value = response));
};
consulta();

let toggleRegistro = () => {
  mostrarRegistro.value = !mostrarRegistro.value;
};

const anadirEvento = async (actividad) => {
  if (actividad.lugar && actividad.fecha && actividad.profesores.length > 0 && actividad.grupos.length > 0) {
    try {
      const response = await fetch("api/v1/profesores");
      const data = await response.json();

      let profesoresA = []
      actividad.profesores.forEach(profesor => {
        data.profesores.forEach(profesorApi => {
          if (profesorApi.id == profesor) {
            profesoresA.push(profesorApi.name);

          };
        });
      });

      const response2 = await fetch("api/v1/grupos");
      const data2 = await response2.json();

      let gruposA = []
      actividad.grupos.forEach(grupos => {
        data2.grupos.forEach(gruposApi => {
          if (gruposApi.id == grupos) {
            gruposA.push(gruposApi.name);

          };
        });
      });

      const actividadNueva = {
        lugar: actividad.lugar,
        fecha: actividad.fecha,
        descripcion: actividad.descripcion,
        grupos: gruposA,
        profesores: profesoresA
      };
      datos.value.eventos.push(actividadNueva)
      
    } catch (error) {

    }
  }
};
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
    <hr />

    <button @click="toggleRegistro">Registrar evento</button>
    <RegistroEvento v-if="mostrarRegistro" @submit="anadirEvento" />
  </template>
</template>
<style scoped>
.container {
  display: flex;
  flex-wrap: wrap;
}

hr {
  margin: 50px;
}
button{
  background-color: #CEA647;
}
</style>
