import { createRouter, createWebHistory } from "vue-router";

const routes = [
  { path: "/", component: () => import("@/views/login.vue") },
  { path: "/home", component: () => import("@/views/home.vue") },
  { path: "/random", component: () => import("@/views/random.vue") },
  { path: "/monet", component: () => import("@/views/artwork.vue") },
];
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
