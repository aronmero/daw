import { useRouter } from "vue-router";
import { useUsuarioStore } from "@/stores/usuario";

export function redirectLogin() {
  const router = useRouter();
  const store = useUsuarioStore();
  if (!store.isActivo) {
    router.push("/");
  }
}
