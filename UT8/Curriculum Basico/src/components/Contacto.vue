<script setup>
defineProps({
  email: String,
  github: String,
});

const url = "https://github.com/";
</script>

<template>
  <p>{{ email }}</p>
  <p>Github: 
    <a :href="url + github">{{ github }}</a>
  </p>
</template>
