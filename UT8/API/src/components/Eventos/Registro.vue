<script setup>
import { ref } from 'vue';

let datosProfesores = ref("api");
let consultaProfesores = async () => {
    return await fetch('api/v1/profesores')
        .then((response) => response.json())
        .then(response => datosProfesores.value = response);
}
consultaProfesores();

let datosGrupos = ref("api");
let consultaGrupos = async () => {
    return await fetch('api/v1/grupos')
        .then((response) => response.json())
        .then(response => datosGrupos.value = response);
}
consultaGrupos();
</script>
<template>
    <div>
        <h2>Crear actividad</h2>
        <form method="post" onsubmit="return false">
            <div><label>Lugar</label>
                <input type="text" name="lugar" placeholder="">
            </div>
            <div><label>Fecha</label>
                <input type="date" name="fecha" placeholder="">
            </div>
            <div><label>Descripcion</label>
                <input type="text" name="descripcion" placeholder="">
            </div>

            <div class="checkboxes">
                <h4>Profesores</h4>
                <div>
                    <div v-for="profesor in datosProfesores.profesores">
                        <label for="profesores[]">{{ profesor.name }}</label>
                        <input type="checkbox" name="profesores[]" :value=profesor.id>
                    </div>
                </div>
            </div>

            <div class="checkboxes">
                <h4>Grupos</h4>
                <div>
                    <div v-for="grupo in datosGrupos.grupos">
                        <label for="grupos[]">{{ grupo.name }}</label>
                        <input type="checkbox" name="grupos[]" :value=grupo.id>
                    </div>
                </div>
            </div>
            
            <div><input type="submit"></div>
        </form>
    </div>
</template>
<style scoped>
form {
    display: flex;
    flex-direction: column;
    align-items: center;

    label {
        margin-left: 5px;
        margin-bottom: 5px;
        font-weight: bold;
        align-self: flex-start;
    }

    >div {
        margin: 5px;
        padding: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    input {
        box-sizing: border-box;
        padding: 15px 12px;
        width: 320px;
        border: 1px solid grey;
        border-radius: 12px;
        font-size: 15px;

    }


    div:has(input[type=submit]) {
        margin-top: 20px;


        input {
            font-weight: 600;
            border-radius: 20px;
            background-color: #f1bc27;
            cursor: pointer;
            border-color: #f1bc27;
        }
    }
}

.checkboxes {
    input {
        width: 15px;
        transform: scale(2);
        margin-left: 15px;
    }

    >div {
        display: flex;
        flex-direction: row;

        div {
            display: flex;
            flex-direction: row;
            margin-right: 10px;
        }
    }
}
</style>