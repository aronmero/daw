<script setup>
defineProps({
  nombre: String,
  numero: Number,
});
</script>
<template>
  <div class="hastag">
    <div class="text">
      <a href="#">#{{ nombre }}</a>
    </div>
    <div class="number">{{ numero }} publicaciones</div>
    <hr />
  </div>
</template>
<style scoped lang="scss">
.hastag {
  display: flex;
  flex-direction: column;
  gap: 10px;
  padding: 0px 5px;

  .text {
    font-size: 14px;
  }
  .number {
    font-size: 10px;
    color: rgba($text-color-black, 0.6);
  }
  hr {
    width: 100%;
    border: 1px solid $secondary-color;
    border-radius: 10px;
  }
  max-width: 320px;
}
</style>
