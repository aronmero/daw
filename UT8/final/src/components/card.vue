<script setup>

defineProps({
    img_id: String,
    alt_text: String,
    tituloObra: String,
    autor: String,
    fecha: Number,
    descripcion: String
});

</script>
<template>
    <div class="card">
        <img :src="`https://www.artic.edu/iiif/2/${img_id}/full/200,/0/default.jpg`" :alt="alt_text" :title="alt_text">
        <div>{{ tituloObra }} </div>
        <div>{{ autor }}</div>
        <div> {{ fecha }}</div>
        <div>{{ descripcion }}</div>
    </div>
</template>
<style scoped>
.card {
    display: flex;
    flex-direction: column;
    width: 200px;
}
</style>