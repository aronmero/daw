import { crearPregunta,imprimirPregunta,preguntas,preguntasTest } from "./logica.js";

crearPregunta(
  "pre01",
  1.0,
  "¿Quién interpreta al personaje principal, Din Djarin, en 'The Mandalorian'?",
  1,
  "Pedro Pascal",
  "Oscar Isaac",
  "Adam Driver"
);
crearPregunta(
  "pre02",
  1.0,
  "¿Cuál es el nombre real del personaje apodado 'Baby Yoda' en la serie?",
  1,
  "Grogu",
  "Yaddle",
  "Yoda Jr."
);
crearPregunta(
  "pre03",
  1.0,
  "¿Quién es el creador y productor ejecutivo de 'The Mandalorian'?",
  3,
  "George Lucas",
  "J.J. Abrams",
  "Jon Favreau"
);
crearPregunta(
  "pre04",
  1.0,
  "¿En qué planeta se encuentra la mayoría de la trama de 'The Mandalorian'?",
  1,
  "Tatooine",
  "Alderaan",
  "Endor"
);
crearPregunta(
  "pre05",
  1.0,
  "¿En qué planeta natal se crió Din Djarin, el protagonista de 'The Mandalorian'?",
  1,
  "Mandalore",
  "Tatooine",
  "Alderaan"
);
crearPregunta(
  "pre06",
  1.0,
  "¿Qué legendario cazarrecompensas hace una aparición en la segunda temporada de 'The Mandalorian'?",
  1,
  "Boba Fett",
  "Cad Bane",
  "Zam Wesell"
);
crearPregunta(
  "pre07",
  1.0,
  "¿Qué arma característica utiliza el protagonista en la serie?",
  2,
  "Un sable de luz",
  "Un bláster",
  "Un látigo de fuego"
);
crearPregunta(
  "pre08",
  1.0,
  "¿Quién es el antagonista principal de la primera temporada de 'The Mandalorian'?",
  1,
  "Moff Gideon",
  "Boba Fett",
  "Cara Dune"
);
crearPregunta(
  "pre09",
  1.0,
  "¿En qué período de tiempo se desarrolla 'The Mandalorian' en el universo de 'Star Wars'?",
  2,
  "Antes de la República Galáctica",
  "Después de la caída del Imperio Galáctico",
  "Durante la Gran Guerra Sith"
);
crearPregunta(
  "pre10",
  1.0,
  "¿Cuál es el nombre de la especie a la que pertenece el personaje principal, Din Djarin?",
  1,
  "Mandalorianos",
  "Wookiees",
  "Hutts"
);
imprimirPregunta(preguntas["pre01"]);
imprimirPregunta(preguntas["pre02"]);
imprimirPregunta(preguntas["pre03"]);
imprimirPregunta(preguntas["pre04"]);
imprimirPregunta(preguntas["pre05"]);
imprimirPregunta(preguntas["pre06"]);
imprimirPregunta(preguntas["pre07"]);
imprimirPregunta(preguntas["pre08"]);
imprimirPregunta(preguntas["pre09"]);
imprimirPregunta(preguntas["pre10"]);