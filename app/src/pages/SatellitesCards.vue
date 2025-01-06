<template>
    <div class="w-full h-full">
        <Carousel v-bind="config" class="w-full h-full">
            <Slide v-for="satellite in satellites" :key="satellite.id">
                <Satellite :satellite="satellite" class="my-2 p-2" />
            </Slide>
            <template #addons>
                <Navigation />
                <Pagination />
            </template>
        </Carousel>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useSatellite } from "../store/useSatellite"
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import Satellite from "../components/satellite/Satellite.vue"

const satellites = ref();
const config = {
    itemsToShow: 1.5
}

const store = useSatellite();

onMounted(async () => {
    const allSatellites = await store.fetchAllSatellites();
    satellites.value = allSatellites;
})


</script>