import { http, HttpResponse } from "msw";

export const handlers = [
  http.get("api/v1/profesores", () => {
    // Note that you DON'T have to stringify the JSON!
    return HttpResponse.json({
      profesores: [
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
      ],
    });
  }),
  http.get("api/v1/grupos", () => {
    // Note that you DON'T have to stringify the JSON!
    return HttpResponse.json({
      grupos: [
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
      ],
    });
  }),
  http.get("api/v1/eventos", () => {
    // Note that you DON'T have to stringify the JSON!
    return HttpResponse.json({
      eventos: [
        {
          lugar: "Roque",
          fecha: "23-11-2023",
          descripcion: "Visita al roque",
          grupos: ["1ºESO", "2ºESO"],
          profesores: ["Nico", "Luis"],
        },
        {
          lugar: "Puntagorda",
          fecha: "8-12-2023",
          descripcion: "Visita a puntagorda",
          grupos: ["1ºESO", "2ºESO"],
          profesores: ["Paco", "Luz", "Estela"],
        },
        {
          lugar: "Salinas",
          fecha: "18-12-2023",
          descripcion: "Visita a las salinas",
          grupos: ["4ºESO"],
          profesores: ["Nico"],
        },
        {
          lugar: "Time",
          fecha: "7-12-2023",
          descripcion: "Visita al time",
          grupos: ["1ºESO", "2ºESO"],
          profesores: ["Nico", "Luis"],
        },
        {
          lugar: "Pueblo",
          fecha: "02-02-2024",
          descripcion: "Excursión cultural",
          grupos: ["2ºESO", "3ºESO"],
          profesores: ["Carlos", "Elena"],
        },
        {
          lugar: "Montaña",
          fecha: "10-03-2024",
          descripcion: "Senderismo en la montaña",
          grupos: ["1ºBACH", "2ºBACH"],
          profesores: ["Mario", "Laura"],
        },
        {
          lugar: "Museo",
          fecha: "05-04-2024",
          descripcion: "Visita al museo de historia",
          grupos: ["1ºBACH", "2ºBACH"],
          profesores: ["Sara", "Pedro"],
        },
      ],
    });
  }),
];
