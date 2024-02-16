// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  extends: ["@nuxt/ui-pro"],
  devtools: { enabled: true },
  ssr: false,
  modules: ["@nuxtjs/eslint-module", "@nuxt/ui"],
  colorMode: {
    preference: "light",
  },
});
