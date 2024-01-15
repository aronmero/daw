<script setup>
defineProps({
  nombre: String,
  nivel: String,
});
</script>
<template><li>{{ nombre }} - {{ nivel }}</li></template>
