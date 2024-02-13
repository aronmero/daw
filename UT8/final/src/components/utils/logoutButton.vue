<script setup>
import { useUsuarioStore } from "@/stores/usuario";
const store = useUsuarioStore();
</script>
<template>
  <button @click="store.logout()" class="logoutButton">Cerrar Sesion</button>
</template>
