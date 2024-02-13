<script setup>
import { ref } from "vue";
const emit = defineEmits(["submit"]);
defineProps({
  titulo: String,
  descripcion: String,
  grupos: Array,
  profesores: Array,
  error: String,
});

const email = ref("");
const password = ref("");

function submitFormulario() {
  if (email.value && password.value) {
    emit("submit", { email: email.value, password: password.value });
  } else {
    console.warn("Invalido");
  }
}
</script>

<template>
  <div>
    <h2>{{ titulo }}</h2>
    <form method="post" @submit.prevent="submitFormulario">
      <div>
        <label>Email</label>
        <input
          type="email"
          name="email"
          placeholder="email@email.com"
          v-model="email"
        />
      </div>
      <div>
        <label>Contraseña</label>
        <input
          type="password"
          name="password"
          placeholder="Tu contraseña"
          v-model="password"
        />
      </div>
      <div><input type="submit" /></div>
    </form>
    <div v-if="error" class="error-message">{{ error }}</div>
  </div>
</template>
<style scoped>
.error-message {
  color: red;
  margin-top: 10px;
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

  > div {
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
    border-radius: 12px;
    font-size: 15px;
    border: 1px solid #CFBF9E;
  }

  div:has(input[type="submit"]) {
    margin-top: 20px;

    input {
      font-weight: 600;
      border-radius: 20px;
      background-color: #CEA647;
      cursor: pointer;
      border-color: #CEA647;
    }
  }
}
</style>
