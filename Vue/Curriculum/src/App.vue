<script setup>

import Idioma from "./components/Persona/Idioma.vue";
import Contacto from "./components/Persona/Contacto.vue";
import Estudio from "./components/Persona/Estudio.vue";
import Experiencia from "./components/Persona/Estudio.vue";

const Personas = [{
  nombre: "Aarón Medina Rodríguez",
  titulo: "Desarrollador Web",
  contacto: {
    email: "aronmedinasp@gmail.com",
    github: "aronmero"
  },
  formacion: [
    {
      titulo: "Tecnico superior en Desarrollo de Aplicaciones Web",
      centro: "IES Jose Maria Perez Pulido",
      fechaInicio: "2022",
      fechaFinal: "2024"
    },
    {
      titulo: "Grado en Bellas Artes",
      centro: "Universidad de La Laguna",
      fechaInicio: "2017",
      fechaFinal: "2021"
    },
  ],
  experiencia: [],
  idiomas: [{
    nombre: "Español",
    nivel: "Nativo"
  }, {
    nombre: "Ingles",
    nivel: "Intermedio"
  }]
},]
</script>

<template>
  <div v-for="persona in Personas">
    <h1>{{ persona.nombre }}</h1>
    <h2>{{ persona.titulo }}</h2>
    <Contacto :email=persona.contacto.email :github=persona.contacto.github /> <br>
    <h3>Formación</h3>
    <div v-for="titulos in persona.formacion">
      <Estudio :titulo=titulos.titulo :ubicacion=titulos.centro :fechaInicial=titulos.fechaInicio
        :fechaFinal=titulos.fechaFinal />
    </div>

    <div v-if="persona.experiencia.length > 0">
      <h3>Experiencia</h3>
      <div v-for="experiencia in persona.experiencia">
        <Experiencia :titulo=experiencia.titulo :ubicacion=experiencia.centro :fechaInicial=experiencia.fechaInicio
          :fechaFinal=experiencia.fechaFinal />
      </div>
    </div>


    <div>
      <h3>Idiomas</h3>
      <div v-for="idioma in persona.idiomas">
        <Idioma :nombre=idioma.nombre :nivel=idioma.nivel />
      </div>
    </div>
    <Contacto :email=persona.contacto.email :github=persona.contacto.github /> <br>
  </div>
</template>

<style scoped></style>
