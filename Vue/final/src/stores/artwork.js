import { defineStore } from "pinia";
import { ref } from "vue";

/**
 * Store de obras comunes de la api
 * @date 2/23/2024 - 4:02:19 PM
 * @author Aaron Medina Rodriguez
 */
export const useArtworkStore = defineStore("artwork", () => {
  const isVacio = ref(true);
  const data = ref({});

  /**
   * Añade artworks al store
   * @date 2/23/2024 - 4:01:53 PM
   * @author Aaron Medina Rodriguez
   *
   * @param {Object} artworks
   * @returns
   */
  function anadir(artworks) {
    this.isVacio = false;
    this.data = artworks;
  }

  return { isVacio, data, anadir };
});

/**
 * Store de obras de arte de Monet
 * @date 2/23/2024 - 4:02:19 PM
 * @author Aaron Medina Rodriguez
 */
export const useMonetStore = defineStore("monet", () => {
  const isVacio = ref(true);
  const data = ref({});

  /**
   * Añade artworks al store
   * @date 2/23/2024 - 4:01:53 PM
   * @author Aaron Medina Rodriguez
   *
   * @param {Object} artworks
   * @returns
   */
  function anadir(artworks) {
    this.isVacio = false;
    this.data = artworks;
  }

  return { isVacio, data, anadir };
});
