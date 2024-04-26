<script setup>
import Header from "@/components/header.vue";
import Footer from "@/components/footer.vue";
import Tendencias from "@/components/utils/tendencias.vue";
import Publicion from "@/components/utils/publicacion.vue";
import BotonPublicar from "@/components/utils/botonPublicar.vue";
</script>
<template>
  <Header />
  <div class="content">
    <aside class="Left">
      <div class="title">Destacado del día</div>
      <Publicion />
    </aside>
    <section class="container-publicaciones">
      <div class="selector-tipo-publicaciones">
        <div class="title"><a href="#">Para ti</a></div>
        <div class="title">
          <a href="#">Seguidos</a>
          <hr />
        </div>
      </div>
      <div class="publicaciones"><Publicion /><Publicion /></div>
    </section>
    <aside class="Right"><Tendencias /></aside>
  </div>
  <BotonPublicar/>
  <Footer />
</template>
<style scoped>
.content {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  margin-bottom: 100px;

  .Left,
  .Right {
    max-width: 400px;
  }
  .Left {
    width: 20vw;
    margin-top: 60px;
    .title {
      margin-bottom: 10px;
    }
  }
  .Right {
    margin-top: 100px;
  }
  .container-publicaciones {
    .selector-tipo-publicaciones {
      display: flex;
      justify-content: space-around;
      align-items: center;
      height: 100px;
      .title {
        display: flex;
        flex-direction: column;
        align-items: center;
        hr {
          margin: 0;
          border: #5ca8e2 1px solid;
          width: 100px;
        }
      }
    }
    .publicaciones {
      display: flex;
      flex-direction: column;
      width: 40vw;
      max-width: 880px;
      gap: 60px;
    }
  }
}
.title {
  font-size: 24px;
}
@media screen and (max-width: 1400px) {
  .content {
    padding-top: 25px;
  }
}
@media screen and (max-width: 1200px) {
  .Left,
  .Right {
    display: none;
  }
  .content {
    .container-publicaciones {
      .publicaciones {
        width: 80vw;
      }
    }
  }
}
@media screen and (max-width: 768px) {
  .content {
    margin-top: 25px;
  }
}
</style>
