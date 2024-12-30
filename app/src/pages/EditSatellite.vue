<template>
    <form class="max-w-sm min-w-80 rounded mx-auto p-8 shadow">
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
            <input type="text" id="name"
                class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="Solar Prime" @keydown.enter="addNewSatellite" required />
        </div>
        <button type="submit"
            class="text-white hover:bg-lime-700 focus:ring-4 focus:outline-none focus:ring-lime-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-lime-600">Submit</button>
    </form>
</template>

<script setup>
import { computed, reactive, onMounted, ref } from "vue";
import { createSatellite } from "../api/satellite-api"

const newSatellite = reactive({
    name: ''
})

const satellite = ref([])

onMounted(async () => {
    // get edit
})

const emit = defineEmits(['added'])


const handleAddSatellite = async (newSatellite) => {
    const { data: createSatellite } = await createSatellite(newSatellite)

    satellite.value.unshift(createSatellite.data)
}
</script>