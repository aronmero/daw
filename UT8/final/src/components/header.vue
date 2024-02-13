<script setup>
import LogoutButton from "@/components/utils/logoutButton.vue";
</script>
<template>
  <header><div></div><div><LogoutButton /></div></header>
</template>
<style scoped>
header {
    display: flex;
    left: 0;
    position: absolute;
    top: 0;
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

.logoutButton {


}
</style>
