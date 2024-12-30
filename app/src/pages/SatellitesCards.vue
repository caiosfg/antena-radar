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
import { allSatellites } from "../api/satellite-api";
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import Satellite from "../components/satellite/Satellite.vue"

const satellites = ref([]);
const config = {
    itemsToShow: 1.5
}


onMounted(async () => {
    const { data } = await allSatellites()
    satellites.value = data.data;
    console.log('data here', data);
})


</script>