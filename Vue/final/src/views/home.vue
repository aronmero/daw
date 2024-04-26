<script setup>
import { useArtworkStore } from "@/stores/artwork";
import { ref, onMounted } from "vue";
import Header from "@/components/header.vue"
import Card from "@/components/card.vue";
import { apiArtworks } from "@/Api/api.js";
import { redirectLogin } from "@/utils/utils";

const store = useArtworkStore();

const dataArtworks = ref([])

if (!redirectLogin()) {

  if (store.isVacio) {
    onMounted(async () => {
      dataArtworks.value = await apiArtworks();
      console.log(dataArtworks.value);
      store.anadir(dataArtworks.value);
    })
  } else {
    dataArtworks.value = store.data;
  }
}

</script>
<template>
  <Header />
  <section v-if="dataArtworks.data !== undefined">
    <h1>{{ dataArtworks.data.length }} obras </h1>
    <div class="card_container">
      <Card v-for="artwork in dataArtworks.data" :img_id="artwork.image_id" :alt_text="artwork.thumbnail.alt_text"
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