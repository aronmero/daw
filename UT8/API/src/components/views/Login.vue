<script setup>
import AuthUsuario from "../AuthUsuario.vue";
import { ref } from "vue";

const emit = defineEmits(["usuario-verificado"]);
let errorMsg = ref(null);
const tryAuthUser = async (userData) => {
  if (userData.email && userData.password) {
    try {
      const response = await fetch("api/v1/usuarios");
      const data = await response.json();

      const usuarioEncontrado = data.usuarios.find(
        (usuario) =>
          usuario.email === userData.email &&
          usuario.password === userData.password
      );

      if (usuarioEncontrado) {
        console.log("Usuario verificado:", usuarioEncontrado);
        emit("usuario-verificado", usuarioEncontrado);
        errorMsg.value = "";
      } else {
        errorMsg.value = "Email o contraseña incorrectos.";
      }
    } catch (error) {
      errorMsg.value = "Error al obtener usuarios de la API.";
    }
  }
};
</script>
<template>
  <router-link to="/">Inicio</router-link>
  <AuthUsuario
    titulo="Iniciar sesion"
    @submit="tryAuthUser"
    :error="errorMsg"
  />
</template>
