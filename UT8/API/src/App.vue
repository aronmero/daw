<script setup>
import { ref } from "vue";
const usuario = ref(null);

const asignarUsuario = (usuarioVerificado) => {
  usuario.value = usuarioVerificado;
};
</script>

<template>
  <template v-if="$route.path != '/login' && usuario === null">
    <router-link to="/login">Login</router-link>
  </template>
  <template v-if="$route.path === '/login'">
    <router-view @usuario-verificado="asignarUsuario" />
  </template>
  <template v-else>
    <router-view :usuario="usuario"/>
  </template>
</template>
