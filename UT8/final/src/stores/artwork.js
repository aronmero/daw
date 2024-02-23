import { defineStore } from "pinia";
import { ref } from "vue";
export const useArtworkStore = defineStore("artwork", () => {
  const isVacio = ref(true);
  const data = ref({});

  function anadir(artworks) {
    this.isVacio = false;
    this.data=artworks;
  }


  return { isVacio, data, anadir };
});

export const useMonetStore = defineStore("monet", () => {
  const isVacio = ref(true);
  const data =  ref({});

  function anadir(artworks) {
    this.isVacio = false;
    this.data=artworks;
  }

  return { isVacio, data, anadir };
});
