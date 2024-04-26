<script setup></script>
<template>
  <footer>
    <RouterLink to="/"
      ><img src="@public/assets/utils/search.svg"
    /></RouterLink>
    <RouterLink to="/"><img src="@public/assets/utils/home.svg" /></RouterLink>
    <RouterLink to="/"
      ><img src="@public/assets/utils/user.svg"
    /></RouterLink>
  </footer>
</template>
<style scoped lang="scss">
@media (min-width: 600px) {
  footer {
    display: none;
  }
}
@media (max-width: 600px) {
  footer {
    bottom: 0;
    position: fixed;
    height: 60px;
    width: 100%;
    display: flex;
    align-items: center;
    flex-direction: row;
    background-color: $text-color-black;
    justify-content: space-evenly;
    padding-left: 24px;
    padding-right: 32px;
    box-sizing: border-box;
    a {
      display: flex;
      align-items: center;
      scale: 0.8;
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
    }
  }
}
@media (min-width: 500px) {
  footer {
    justify-content: space-around;
  }
}

</style>
