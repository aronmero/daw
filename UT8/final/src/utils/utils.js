import { useRouter } from "vue-router";
import { useUsuarioStore } from "@/stores/usuario";

/**
 * Redirige a la pagina de login si el usuario no esta con sesion iniciada
 * @date 2/23/2024 - 4:03:08 PM
 * @author Aaron Medina Rodriguez
 *
 * @export
 * @returns {boolean}
 */
export function redirectLogin() {
  const router = useRouter();
  const store = useUsuarioStore();
  if (!store.isActivo) {
    router.push("/");
    return true;
  }
  return false;
}
