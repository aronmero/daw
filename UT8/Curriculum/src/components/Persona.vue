<script setup>
import Formacion from "./Persona/Formacion.vue";
import Titulo from "./Persona/Titulo.vue";
import Contacto from "./Persona/Contacto.vue";
import Idiomas from "./Persona/Idiomas.vue";

defineProps({
  nombre: String,
});
</script>

<template>
  <h1>{{nombre}}</h1>
  <Titulo titulo="Desarrollador Web"/>
  <Contacto email="aronmedinasp@gmail.com" github="aronmero"/>  <br>
  <h3>Formación</h3>
  <Formacion />  <br>
  <Idiomas/>  <br>
  <Contacto email="aronmedinasp@gmail.com" github="aronmero"/>
 
</template>

<style scoped>

</style>
