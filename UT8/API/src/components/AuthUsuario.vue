<script setup>

defineProps({
    titulo: String,
    descripcion: String,
    grupos: Array,
    profesores: Array,
});

</script>

<template>
    <div>
        <h2>{{ titulo }}</h2>
        <form method="post" onsubmit="return false">
            <div><label>Email</label>
                <input type="email" name="email" placeholder="email@email.com">
            </div>
            <div><label>Contraseña</label>
                <input type="password" name="password" placeholder="Tu contraseña">
            </div>
            <div><input type="submit" ></div>
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
</style>