<script setup>
import { ref } from 'vue'

defineProps({
    lugar: String,
    fecha: String,
    descripcion: String,
    grupos: Array,
    profesores: Array,
})

const count = ref(0)
</script>

<template>
    <div class="evento">
        <h2>{{ lugar }}</h2>
        <h3>{{ fecha }}</h3>
        <p>{{ descripcion }}</p>
        <h4>Profesores</h4>
        <div class="profesores">
            <div v-for="profesor in profesores">{{ profesor }}</div>
        </div>

        <h4>Grupos</h4>
        <div class="grupos">
            <div v-for="grupo in grupos">{{ grupo }}</div>
        </div>
    </div>
</template>

<style scoped>
.read-the-docs {
    color: #888;
}
h2{
    font-size: xx-large;
}
.profesores,
.grupos {
    display: flex;
    justify-content: space-around;
}

.evento {
    border: 1px solid black;
    border-radius: 25px;
    margin: 15px;
    padding: 25px;
    width: 300px;
}</style>
