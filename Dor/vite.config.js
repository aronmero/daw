import { defineConfig } from "vite";
import path from 'path';
import vue from "@vitejs/plugin-vue";

// https://vitejs.dev/config/
export default defineConfig({
  
  plugins: [vue()],
  server: {
    port: 3010,
  },
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "src"),
      "@public": path.resolve(__dirname, "public"),
    },
  },
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "@/styles/variables.scss";`, // Importa tus variables SCSS globales aquí
      },
    },
  }
});
