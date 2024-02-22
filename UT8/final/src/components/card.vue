<script setup>

defineProps({
    img_id: String,
    alt_text:String,
    tituloObra: String,
    autor: String,
    fechaInicio: Number,
    fechaFin: Number,
    descripcion: String
});

</script>
<template>
    <img :src="`https://www.artic.edu/iiif/2/${img_id}/full/200,/0/default.jpg`" :alt="alt_text" :title="alt_text">
    <div>{{ tituloObra }} </div>
    <div>{{ autor }}</div>
    <div> {{ fechaInicio }}- {{ fechaFin }}</div>
    <div>{{ descripcion }}</div>
</template>
