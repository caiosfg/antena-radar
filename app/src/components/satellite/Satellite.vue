<template>
    <div class="h-96 w-96 bg-white border border-gray-200 rounded-lg shadow">
        <div class="flex justify-end px-4 pt-4">
            <button id="dropdownButton" data-dropdown-toggle="dropdown"
                class="inline-block text-gray-500 hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-200 rounded-lg text-sm p-1.5"
                type="button">
                <span class="sr-only">Editar</span>
                <svg width="25px" height="25px" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 18h2v16h-2z" />
                    <path d="M24 18h2v16h-2z" />
                    <path d="M28 18h2v16h-2z" />
                    <path d="M12 12h26v2H12z" />
                    <path
                        d="M30 12h-2v-1c0-.6-.4-1-1-1h-4c-.6 0-1 .4-1 1v1h-2v-1c0-1.7 1.3-3 3-3h4c1.7 0 3 1.3 3 3v1z" />
                    <path
                        d="M31 40H19c-1.6 0-3-1.3-3.2-2.9l-1.8-24 2-.2 1.8 24c0 .6.6 1.1 1.2 1.1h12c.6 0 1.1-.5 1.2-1.1l1.8-24 2 .2-1.8 24C34 38.7 32.6 40 31 40z" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col items-center pb-10">
            <img v-if="satellite.avatar" class="w-24 h-24 mb-3 rounded-full shadow-lg" :src="satellite.avatar"
                :alt="satellite.name" />
            <img v-else class="w-24 h-24 mb-3 rounded-full shadow-lg" src="../../assets/antenna.svg"
                alt="satellite image" />
            <div class="flex flex-col items-center w-full">
                <h5 class="mb-1 text-xl font-medium text-gray-900">{{ satellite.name }}</h5>
                <p class="text-sm text-gray-500">{{ satellite.description }}</p>
                <div class="flex flex-col text-left">
                    <p class="text-xs mt-3 text-gray-500">Endereço: {{ satellite.location }} - {{ satellite.uf }}</p>
                    <p class="text-xs text-gray-500">Altura: {{ satellite.height }}</p>
                </div>
            </div>
        </div>
        <div class="flex mt-6 w-full px-12">
            <RouterLink :to="`/editar-antena/${satellite.id}`"
                class="text-white hover:bg-lime-700 focus:ring-4 focus:outline-none focus:ring-lime-800 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-lime-600">
                Editar</RouterLink>
        </div>
    </div>
</template>

<script setup>
defineProps({
    satellite: Object
})
</script>