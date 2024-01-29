<script setup>
import AuthUsuario from '../AuthUsuario.vue';
import { ref } from 'vue';
let datos = ref("api");
let consulta = async () => {
    return await fetch('api/v1/usuarios')
        .then((response) => response.json())
        .then(response => datos.value = response);
}

</script>
<template>
    <router-link to="/">Inicio</router-link>
    <AuthUsuario titulo="Iniciar sesion" />
</template>