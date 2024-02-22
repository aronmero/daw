<script setup>
import { useUsuarioStore } from "@/stores/usuario";
import { RouterLink } from "vue-router";
const store = useUsuarioStore();

</script>
<template>
  <router-link @click="store.logout()" class="logoutButton" to="/">Cerrar Sesion</router-link>
</template>
