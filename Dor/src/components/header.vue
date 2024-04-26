<script setup></script>
<template>
  <header>
    <RouterLink to="/"
      ><img
        class="logo"
    /></RouterLink>
    <div class="enlaces">
      <RouterLink to="/"
        ><img src="@public/assets/utils/search.svg"
      /></RouterLink>
      <RouterLink to="/"
        ><img src="@public/assets/utils/user.svg"
      /></RouterLink>
      <RouterLink to="/"
        ><img src="@public/assets/utils/settings.svg"
      /></RouterLink>
    </div>
  </header>
</template>
<style scoped lang="scss">
header {
  height: 60px;
  width: 100%;
  display: flex;
  align-items: center;
  flex-direction: row;
  background-color: $text-color-black;
  justify-content: space-between;
  padding-left: 24px;
  padding-right: 32px;
  box-sizing: border-box;
  a {
    display: flex;
    align-items: center;
    scale: 0.8;
  }
}
.enlaces {
  display: flex;
  align-items: center;
  flex-direction: row;
  gap: 30px;
}
.logo {
  width: 40px;
  height: 40px;
  border-radius: 100%; //Esto se podria eliminar al poner un logo en condiciones
  background-color: #B8B8B8;
}
@media screen and (max-width: 768px) {
  header {
    position: fixed;
    top: 0;
    padding-left: 20px;
    padding-right: 20px;
  }
  .enlaces {
    gap: 20px;
  }
}

@media screen and (max-width: 600px) {
  .enlaces {
    > *:not(:last-child) {
      display: none;
    }
  }
}
</style>
