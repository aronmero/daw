import { createRouter, createWebHistory } from "vue-router";

/**
 * Definición de las rutas del enrutador.
 */
const routes = [
  { path: "/", component: () => import("@/views/login.vue") },
  { path: "/home", component: () => import("@/views/home.vue") },
  { path: "/artistas", component: () => import("@/views/artistas.vue") },
  { path: "/random", component: () => import("@/views/random.vue") },
  { path: "/monet", component: () => import("@/views/artwork.vue") },
];

/**
 * Crea y configura un enrutador utilizando las rutas definidas.
 */
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
