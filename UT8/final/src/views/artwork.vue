<script setup>
import { useMonetStore } from "@/stores/artwork";
import { ref, onMounted } from "vue";
import Header from "@/components/header.vue"
import Card from "@/components/card.vue";
import { apiArtworks,apiArtworksRandom2 } from "@/Api/api.js";
import { redirectLogin } from "@/utils/utils";
redirectLogin();
const store = useMonetStore();

const dataArtworks = ref([])
if (store.isVacio) {
  onMounted(async () => {
    dataArtworks.value = await apiArtworksRandom2();
    store.anadir(dataArtworks.value);
  })
} else {
  dataArtworks.value = store.data;
}

</script>
<template>
    <Header />
    <section v-if="dataArtworks.data !== undefined">
        <h1>{{ dataArtworks.data.length }} Obras de {{ dataArtworks.artist }}</h1>
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