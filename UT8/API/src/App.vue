<script setup>

let usuario;
</script>

<template>
  <template v-if="$route.path != '/login'">
    <router-link to="/login">Login</router-link>
  </template>
  <router-view></router-view>
</template>