import { createApp } from "vue";
import "./style.css";
import "./styles/style.scss";
import router from "@/router/index.js";
import App from "./App.vue";

async function enableMocking() {
  if (process.env.NODE_ENV !== "development") {
    return;
  }
  const { worker } = await import("@/mocks/browser");

  return worker.start();
}

enableMocking().then(() => {
  const app = createApp(App);
  app.use(router);
  app.mount("#app");
});
