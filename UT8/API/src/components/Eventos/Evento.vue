<script setup>

defineProps({
    lugar: String,
    fecha: String,
    descripcion: String,
    grupos: Array,
    profesores: Array,
})

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

h2 {
    font-size: xx-large;
}

.profesores,
.grupos {
    display: flex;
    justify-content: space-around;
}

.evento {
    background-color:#CFBF9E;
    box-shadow: 0px 0px 5px 2px #a59d94;
    border-radius: 25px;
    margin: 15px;
    padding: 25px;
    width: 300px;
}
</style>
