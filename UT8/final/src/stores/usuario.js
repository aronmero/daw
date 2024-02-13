import { defineStore } from "pinia";
import { ref } from "vue";
export const useUsuarioStore = defineStore("usuario", () => {
  const isActivo = ref(false);
  const data = {};

  function login(userData) {
    const datosUsuario = {
      id: userData.id,
      email: userData.email,
      nombre: userData.nombre,
    };
    this.isActivo = true;
    this.data = datosUsuario;
  }
  
  function logout() {
    this.isActivo = false;
    this.data = {};
  }

  return { isActivo, data, login ,logout};
});
