<template>
    <div class="w-full h-full">
        <Carousel v-bind="config" class="w-full h-full">
            <Slide v-for="satellite in satellites" :key="satellite.id">
                <div class="h-96 w-96 bg-white border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-end px-4 pt-4">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown"
                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                            type="button">
                            <span class="sr-only">Editar</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 16 3">
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="../assets/antenna.svg"
                            alt="satellite image" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900">{{ satellite.name }}</h5>
                        <span class="text-sm text-gray-500">{{ satellite.description }}</span>
                        <div class="flex mt-6">
                            <a href="#"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Adicione</a>
                            <a href="#"
                                class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Texto</a>
                        </div>
                    </div>
                </div>
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
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

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