<script setup>
import { useUsuarioStore } from "@/stores/usuario";
import { ref, onMounted } from "vue";
import Login from "@/components/Login.vue";
import Header from "@/components/header.vue"
import Card from "@/components/card.vue";
import { apiArtworks,apiArtworksPaginated } from "@/Api/api.js";

//const artworks=apiArtworks();
const store = useUsuarioStore();

const dataArtworks = ref([])



onMounted(async () => {
  dataArtworks.value = await apiArtworksPaginated();
})
</script>
<template>
  <!--<div v-if="!store.isActivo">
    <Login />
  </div> 
  <div v-else>-->
  <Header />
  <section>
   <div v-for="artwork in dataArtworks.data">
    <Card :img_id="artwork.image_id" :alt_text="artwork.thumbnail.alt_text" :tituloObra="artwork.title" :autor="artwork.artist_title" :fechaInicio="artwork.date_start" :fechaFin="artwork.date_end"></Card>
    </div>
  </section>
  <!--</div>-->
</template>
