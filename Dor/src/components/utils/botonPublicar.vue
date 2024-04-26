<script setup></script>
<template>
  <div class="botonAdd">
    <a href="#">
      <img src="@public/assets/utils/Button_ADD.svg" />
    </a>
  </div>
</template>
<style scoped lang="scss">
@media screen and (min-width: 600px) {
  .botonAdd {
    position: fixed;
    right: 20px;
    bottom: 28px;
  }
}
@media screen and (max-width: 600px) {
  .botonAdd {
    position: fixed;
    right: 20px;
    bottom: 80px;
  }
}
</style>
