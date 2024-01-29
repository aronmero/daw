<script setup>

let usuario=null;
</script>

<template>
  <template v-if="$route.path != '/login'">
    <router-link to="/login">Login</router-link>
  </template>
  <router-view/>
</template>