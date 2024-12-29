<template>
  <div>
    <Navbar />
    <Satellites />
    <div class="absolute bottom-0 w-full">
      <Footer />
    </div>
  </div>
</template>


<script setup>
import Navbar from './components/Navbar.vue';
import Satellites from './pages/Satellites.vue';
import Footer from './components/Footer.vue';
</script>

<style scoped></style>
