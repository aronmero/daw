import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import "./style.css";
import Eventos from "./components/views/Eventos.vue";
import Login from "./components/views/Login.vue";
import App from "./App.vue";

async function enableMocking() {
  if (process.env.NODE_ENV !== "development") {
    return;
  }
  const { worker } = await import("./mocks/browser");

  return worker.start();
}

const routes = [
  { path: "/", component: Eventos },
  { path: "/login", component: Login },
];
const router = createRouter({
  history: createWebHistory(),
  routes,
});

enableMocking().then(() => {
  const app = createApp(App);
  app.use(router);
  app.mount("#app");
});
