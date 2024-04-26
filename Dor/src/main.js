import { createApp } from "vue";
import { createPinia } from 'pinia'
import router from "@/router/index.js";
import App from "./App.vue";
import "./styles/default.scss";
import "./styles/style.scss";

async function enableMocking() {
  if (process.env.NODE_ENV !== "development") {
    return;
  }
  const { worker } = await import("@/mocks/browser");

  return worker.start();
}

enableMocking().then(() => {
  const pinia = createPinia()
  const app = createApp(App);
  app.use(router);
  app.use(pinia)
  app.mount("#app");
});
