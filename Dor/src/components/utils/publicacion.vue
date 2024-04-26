<script setup></script>
<template>
  <div class="publicacion">
    <div class="head">
      <div class="titulo">
        <div class="avatar"><img /></div>
        Nombre_Empresa
      </div>
      <a href="#"><div>...</div></a>
    </div>
    <div>
      ¡Descubre nuestra oferta del día! 🎉 Solo por hoy, obtén un 20% de
      descuento en todos los productos de la sección de rebajas. ¡No te lo
      pierdas! 🛍️ #OfertaDelDía #Descuento #Compras
    </div>
    <div><img src="@public/assets/img/publicacion.webp" class="publicacion-img"/></div>
  </div>
</template>
<style scoped lang="scss">
.publicacion {
  background-color: #f0f0f0;
  padding: 24px;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  gap: 24px;
  .head {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    .titulo {
      display: flex;
      align-items: center;
      flex-direction: row;
      gap: 10px;
    }

    .avatar {
      width: 28px;
      height: 28px;
      border-radius: 100px;
      border: 1px solid transparent;
      background-color: #d9d9d9;
    }
  }
  div:has(.publicacion-img){
    overflow: hidden;
  }
  .publicacion-img{
    max-height: 500px;
    width: -webkit-fill-available;
    border-radius: 3px;
  }

}
</style>
