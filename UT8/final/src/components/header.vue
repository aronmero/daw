<script setup>
import LogoutButton from "@/components/utils/logoutButton.vue";
</script>
<template>
  <header>
    <div class="enlaces">
      <router-link to="/home" class="link">Home</router-link>
      <router-link to="/artistas" class="link">Artistas</router-link>
      <router-link to="/random" class="link">Random</router-link>
      <router-link to="/monet" class="link">Monet</router-link>
    </div>
    <div>
      <LogoutButton />
    </div>
  </header>
</template>
<style scoped>
header {
  display: flex;

  height: 100px;
  justify-content: space-between;
  padding: 0px 20px;
  width: -webkit-fill-available;
  overflow-x: hidden;
  flex-direction: row;
  align-items: center;
  flex-wrap: nowrap;
  justify-content: space-between;
}

.enlaces {
  display: flex;
  flex-direction: row;
  gap: 20px;
}
</style>
