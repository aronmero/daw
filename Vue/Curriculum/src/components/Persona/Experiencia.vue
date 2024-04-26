<script setup>
//const msg = 'Prueba!'

defineProps({
  titulo: String,
  ubicacion: String,
  fechaInicial: String,
  fechaFinal: String,
  descripcion:String
});
</script>

<template>
  <h4>{{ titulo }} - {{ ubicacion }}</h4>
  <p>{{ fechaInicial }} - {{ fechaFinal }}</p>
  <p>{{ descripcion }}</p>
</template>
