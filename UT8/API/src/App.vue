<script setup>
import { ref } from "vue";
const usuario = ref(null);

const asignarUsuario = (usuarioVerificado) => {
  usuario.value = usuarioVerificado;
  console.log(usuario.value);
};
</script>

<template>
  <template v-if="$route.path != '/login'">
    <router-link to="/login">Login</router-link>
  </template>
  <router-view @usuario-verificado="asignarUsuario" />
</template>
