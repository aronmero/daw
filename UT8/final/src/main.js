import { createApp } from "vue";
import { createPinia } from "pinia";
import router from "@/router/index.js";
import App from "./App.vue";
import "./style.css";
import "./styles/style.scss";

/**
 * Ajustes para activar el mock de datos
 * @date 2/23/2024 - 4:04:49 PM
 * @author Aaron Medina Rodriguez
 *
 * @async
 */
async function enableMocking() {
  if (process.env.NODE_ENV !== "development") {
    return;
  }
  const { worker } = await import("@/mocks/browser");

  return worker.start();
}

enableMocking().then(() => {
  const pinia = createPinia();
  const app = createApp(App);
  app.use(router);
  app.use(pinia);
  app.mount("#app");
});
