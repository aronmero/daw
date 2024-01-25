<script setup>
import { ref } from 'vue';
//TODO:API FALSA HACIA PROFESORES

let profesores = ref("api");
let consulta = async () => {
    return await fetch('https://www.nico.com/profesores')
        .then((response) => response.json())
        .then(response => datos.value = response);
}
consulta();
</script>
<template>
    <div>
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

            <div class="profesores">
                <div v-for="profesor in profesores">{{ profesor }}</div>
            </div>
        </form>
    </div>
</template>
<style scoped>
.profesores,
.grupos {
    display: flex;
    justify-content: space-around;
}

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
</style>