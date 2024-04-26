import { http, HttpResponse } from "msw";

let profesores = [
  {
    id: "abc-001",
    name: "nico",
  },
  {
    id: "abc-002",
    name: "Luis",
  },
  {
    id: "abc-003",
    name: "Estela",
  },
  {
    id: "abc-004",
    name: "Paco",
  },
  {
    id: "abc-005",
    name: "Laura",
  },

  {
    id: "abc-006",
    name: "Mario",
  },
  {
    id: "abc-007",
    name: "Sara",
  },
  {
    id: "abc-008",
    name: "Pedro",
  },
];
let grupos = [
  {
    id: "001",
    name: "1ºESO",
  },
  {
    id: "002",
    name: "2ºESO",
  },
  {
    id: "003",
    name: "3ºESO",
  },
  {
    id: "004",
    name: "4ºESO",
  },
  {
    id: "005",
    name: "1ºBACH",
  },

  {
    id: "006",
    name: "2ºBACH",
  },
];
let eventos = [
  {
    lugar: "Roque",
    fecha: "2023-11-23",
    descripcion: "Visita al roque",
    grupos: ["1ºESO", "2ºESO"],
    profesores: ["Nico", "Luis"],
  },
  {
    lugar: "Puntagorda",
    fecha: "2023-12-08",
    descripcion: "Visita a puntagorda",
    grupos: ["1ºESO", "2ºESO"],
    profesores: ["Paco", "Luz", "Estela"],
  },
  {
    lugar: "Salinas",
    fecha: "2023-12-18",
    descripcion: "Visita a las salinas",
    grupos: ["4ºESO"],
    profesores: ["Nico"],
  },
  {
    lugar: "Time",
    fecha: "2023-12-07",
    descripcion: "Visita al time",
    grupos: ["1ºESO", "2ºESO"],
    profesores: ["Nico", "Luis"],
  },
  {
    lugar: "Pueblo",
    fecha: "2024-02-02",
    descripcion: "Excursión cultural",
    grupos: ["2ºESO", "3ºESO"],
    profesores: ["Carlos", "Elena"],
  },
  {
    lugar: "Montaña",
    fecha: "2024-03-10",
    descripcion: "Senderismo en la montaña",
    grupos: ["1ºBACH", "2ºBACH"],
    profesores: ["Mario", "Laura"],
  },
  {
    lugar: "Museo",
    fecha: "2024-04-05",
    descripcion: "Visita al museo de historia",
    grupos: ["1ºBACH", "2ºBACH"],
    profesores: ["Sara", "Pedro"],
  },
];

let usuarios = [
  {
    id: "1",
    email: "nico@example.com",
    password: "1234",
  },
  {
    id: "2",
    email: "Luis@example.com",
    password: "1234",
  },
  {
    id: "3",
    email: "Estela@example.com",
    password: "1234",
  },
  {
    id: "4",
    email: "Paco@example.com",
    password: "1234",
  },
  {
    id: "5",
    email: "Laura@example.com",
    password: "1234",
  },

  {
    id: "6",
    email: "Mario@example.com",
    password: "1234",
  },
  {
    id: "7",
    email: "Sara@example.com",
    password: "1234",
  },
  {
    id: "8",
    email: "Pedro@example.com",
    password: "1234",
  },
];
export const handlers = [
  http.get("api/v1/profesores", () => {
    // Note that you DON'T have to stringify the JSON!
    return HttpResponse.json({
      profesores,
    });
  }),
  http.get("api/v1/grupos", () => {
    // Note that you DON'T have to stringify the JSON!
    return HttpResponse.json({
      grupos,
    });
  }),
  http.get("api/v1/eventos", () => {
    // Note that you DON'T have to stringify the JSON!
    return HttpResponse.json({
      eventos,
    });
  }),
  http.get("api/v1/usuarios", () => {
    // Note that you DON'T have to stringify the JSON!
    return HttpResponse.json({
      usuarios,
    });
  }),
];
