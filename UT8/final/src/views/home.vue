<script setup>
import { useUsuarioStore } from "@/stores/usuario";
import { ref, onMounted } from "vue";
import Header from "@/components/header.vue"
import Card from "@/components/card.vue";
import { apiArtworks, apiArtworksPaginated } from "@/Api/api.js";


//const artworks=apiArtworks();
const store = useUsuarioStore();

const dataArtworks = ref([])

onMounted(async () => {
  dataArtworks.value = await apiArtworksPaginated();
})

import { redirectLogin } from "@/utils/utils";
redirectLogin();
</script>
<template>

    <Header />
    <section>
      <h1>Obras de {{dataArtworks.artist}}</h1>
      <div class="card_container">
        <Card v-for="artwork in dataArtworks.data" :img_id="artwork.image_id" :alt_text="artwork.thumbnail"
          :tituloObra="artwork.title" :autor="artwork.artist_title" :fecha="artwork.date_display"></Card>
      </div>
    </section>

</template>
<style scoped>
.card_container {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
}
</style>