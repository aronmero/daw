<script setup>
import { ref, onMounted } from "vue";
import Header from "@/components/header.vue";
import Card from "@/components/card.vue";
import { apiArtworksRandom } from "@/Api/api.js";

const dataArtworks = ref(undefined);

onMounted(async () => {
  dataArtworks.value = await apiArtworksRandom();
});

import { redirectLogin } from "@/utils/utils";
redirectLogin();
</script>
<template>
  <Header />
  <section v-if="dataArtworks !== undefined">
    <div class="card_container">
      <Card
        :img_id="dataArtworks.image_id"
        img_size="843"
        :alt_text="dataArtworks.thumbnail.alt_text"
        :tituloObra="dataArtworks.title"
        :autor="dataArtworks.artist_title"
        :fecha="dataArtworks.date_display"
       class="card_extended"></Card>
    </div>
  </section>
</template>
<style scoped>
.card_extended{
  width: auto;
}
.card_container {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
}
</style>
