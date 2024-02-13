<script setup>
import { useUsuarioStore } from "@/stores/usuario";
import Login from "@/components/Login.vue";
import Header from "@/components/header.vue"
const store = useUsuarioStore();
</script>
<template>
  <div v-if="!store.isActivo"><Login /></div>
  <div v-else>
    <Header/>
  </div>
</template>
