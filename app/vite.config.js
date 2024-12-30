import { fileURLToPath, URL } from "node:url";

import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import vueDevTools from "vite-plugin-vue-devtools";

// https://vite.dev/config/
export default defineConfig({
  server: {
    port: 3000,
    strictPort: true,
    host: true,
    origin: "http://0.0.0.0:3000",
    proxy: {
      "^/ibge/.*": {
        target: "https://servicodados.ibge.gov.br/api/v1/localidades/estados",
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/ibge/, ""),
      },
    },
  },
  local: {
    port: 3000,
    strictPort: true,
    host: true,
    origin: "http://0.0.0.0:3000",
    proxy: {
      "^/ibge/.*": {
        target: "https://servicodados.ibge.gov.br/api/v1/localidades/estados",
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/ibge/, ""),
      },
    },
  },
  plugins: [vue(), vueDevTools()],
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./src", import.meta.url)),
    },
  },
});
