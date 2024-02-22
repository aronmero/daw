import { defineStore } from "pinia";
import { ref } from "vue";
export const useArtworkStore = defineStore("artwork", () => {
  const isVacio = ref(true);
  const data = [];

  function anadir(artworks) {
    this.isVacio = false;
    this.data.push(artworks.data);
  }

  function clean() {
    this.isVacio = true;
    this.data = {};
  }

  return { isVacio, data, anadir, clean };
});
