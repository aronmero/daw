import { useRouter } from "vue-router";
import { useUsuarioStore } from "@/stores/usuario";

export function redirect(ruta="/") {
    const router = useRouter();
      router.push(ruta);
}

export function redirectLogin() {
  const store = useUsuarioStore();
  if(!store.isActivo){
    redirect("/");
   }
}