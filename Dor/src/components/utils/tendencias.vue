<script setup>
import hastag from "@/components/utils/hastag.vue";
const hastags = [
  {
    nombre: "Descuento",
    numero: 80,
  },
  {
    nombre: "Descuento",
    numero: 20,
  },
  {
    nombre: "Descuento",
    numero: 10,
  },
];
</script>
<template>
  <div class="container-hastags">
    <div class="head">
      Tendencias en tu zona
      <a href="#"
        ><img src="/assets/utils/settings.svg" class="setting"
      /></a>
    </div>
    <div class="hastags">
      <hastag
        v-for="hastag in hastags"
        :nombre="hastag.nombre"
        :numero="hastag.numero"
      />
    </div>
    <div class="show-more"><a href="#">Mostrar más</a></div>
  </div>
</template>
<style scoped lang="scss">
.container-hastags {
  width: clamp(200px, 25vw, 340px);
  max-width: 340px;
  border-radius: 10px;
  background-color: $primary-color;
  padding-top: 20px;
  padding-bottom: 20px;
  padding-right: 15px;
  padding-left: 15px;
  gap: 10px;
  display: flex;
  flex-direction: column;

  .head {
    font-size: 20px;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    align-items: center;
    a {
      display: flex;
      align-items: center;
    }

    .setting {
      filter: invert(1);
      width: 24px;
      height: 24px;
    }
  }
  .show-more {
    font-size: 14px;
  }
}
</style>
