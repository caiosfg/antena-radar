<template>
  <div class="flex flex-col h-screen justify-between">
    <Navbar />
    <div class="flex h-full justify-center items-center m-4">
      <RouterView />
    </div>
    <div>
      <Footer />
    </div>
  </div>
</template>


<script setup>
import { RouterView } from 'vue-router';
import Navbar from './components/Navbar.vue';
import Footer from './components/Footer.vue';
</script>

<style scoped></style>
