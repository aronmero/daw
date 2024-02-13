<script setup>
import { useUsuarioStore } from "../stores/usuario";
import Login from "@/components/Login.vue";
const store = useUsuarioStore();
</script>
<template>
  <div v-if="!store.isActivo"><Login /> {{ store }}</div>
  <div v-else>{{ store }}<button @click="store.logout()"></button></div>
</template>
