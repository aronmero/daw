import { http, HttpResponse } from "msw";

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
];
export const handlers = [
  http.get("api/v1/usuarios", () => {
    // Note that you DON'T have to stringify the JSON!
    return HttpResponse.json({
      usuarios,
    });
  })
];
