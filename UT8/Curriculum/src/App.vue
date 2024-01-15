<script setup>
import Formacion from "./components/Formacion.vue";
import Titulo from "./components/Titulo.vue";
import Contacto from "./components/Contacto.vue";
import Idiomas from "./components/Idiomas.vue";
</script>

<template>
  <h1>Aarón Medina Rodríguez</h1>
  <Titulo titulo="Desarrollador Web"/>
  <Contacto email="aronmedinasp@gmail.com" github="aronmero"/>  <br>
  <h3>Formación</h3>
  <Formacion />  <br>
  <Idiomas/>  <br>
  <Contacto email="aronmedinasp@gmail.com" github="aronmero"/>
 
</template>

<style scoped>

</style>
