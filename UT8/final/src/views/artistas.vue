<script setup>
import { useArtworkStore } from "@/stores/artwork";
import { ref, onMounted, computed } from "vue";
import Header from "@/components/header.vue";
import Card from "@/components/card.vue";
import { apiArtworks } from "@/Api/api.js";
import { redirectLogin } from "@/utils/utils";

const store = useArtworkStore();

const dataArtworks = ref([]);

const searchText = ref("");

if (!redirectLogin()) {
  if (store.isVacio) {
    onMounted(async () => {
      dataArtworks.value = await apiArtworks();
      store.anadir(dataArtworks.value);
    });
  } else {
    dataArtworks.value = store.data;
  }
}

const groupedArtworks = computed(() => {
  const grouped = {};
  dataArtworks.value.data.forEach((artwork) => {
    const artist = artwork.artist_title || "Desconocido";
    if (!grouped[artist]) {
      grouped[artist] = [];
    }
    grouped[artist].push(artwork);
  });
  return grouped;
});

const filteredArtworks = computed(() => {
  const filtered = {};
  Object.keys(groupedArtworks.value).forEach((artist) => {
    const artworks = groupedArtworks.value[artist].filter(
      (artwork) =>
        (artwork.title && artwork.title.toLowerCase().includes(searchText.value.toLowerCase())) ||
        (artwork.artist_title && artwork.artist_title.toLowerCase().includes(searchText.value.toLowerCase()))
    );
    if (artworks.length > 0) {
      filtered[artist] = artworks;
    }
  });
  return filtered;
});

const sortedArtists = Object.keys(groupedArtworks.value).sort((a, b) => {
  return groupedArtworks.value[b].length - groupedArtworks.value[a].length;
});

</script>

<template>
  <Header />
  <section v-if="dataArtworks.data !== undefined">
    <input v-model="searchText" placeholder="Buscar por título o artista" />
    <h1>{{ dataArtworks.data.length }} obras </h1>
    <div class="card_container">
      <template v-for="artist in sortedArtists" :key="artist">
        <h2 v-if="filteredArtworks[artist] !== undefined">{{ artist }}</h2>
        <div class="card_group">
          <Card v-for="artwork in filteredArtworks[artist]" :key="artwork.id" :img_id="artwork.image_id"
            :alt_text="artwork.thumbnail.alt_text" :tituloObra="artwork.title" :autor="artwork.artist_title"
            :fecha="artwork.date_display"></Card>
        </div>
      </template>
    </div>
  </section>
</template>

<style scoped>
h2 {
  text-align: left;
  margin-left: 50px;
}

.card_group {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.card_container {
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  align-items: center;
}

input {
  margin-bottom: 10px;
  padding: 15px 19px;
  border-radius: 15px;
  border: none;

  &:focus {
    outline: none;
  }
}</style>
