import { http, HttpResponse } from "msw";
import usuarios from "@/mocks/data/usuarios.js";

export const handlers = [
  http.get("api/v1/usuarios", () => {
    // Note that you DON'T have to stringify the JSON!
    return HttpResponse.json({
      usuarios,
    });
  }),
];
