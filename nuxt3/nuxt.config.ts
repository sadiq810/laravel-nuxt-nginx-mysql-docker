// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },

  runtimeConfig: {
    public: {
      apiBase: process.env.API_URL,
      apiSsrBase: process.env.API_SSR_URL,
    }
  }
})
