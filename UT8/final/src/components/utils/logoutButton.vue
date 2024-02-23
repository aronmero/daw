<script setup>
import { useUsuarioStore } from "@/stores/usuario";
import { RouterLink } from "vue-router";
const store = useUsuarioStore();

</script>
<template>
  <router-link @click="store.logout()" class="logoutButton" to="/">Cerrar Sesion</router-link>
</template>

<style scoped>
.logoutButton{
  border-radius: 8px;
  border: 1px solid transparent;
  padding: 0.6em 1.2em;
  background-color: #dadada;
  cursor: pointer;
  transition: border-color 0.25s;
  &:hover{
    color: inherit;
    background-color: #c2bfbf;
  }
}
</style>