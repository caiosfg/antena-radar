<template>
    <div class="shadow-lg shadow-lime-200 p-8 rounded-md flex items-center space-x-2">
        <div class="h-12 w-12 flex items-center justify-center rounded-full">
            <div class="bg-lime-600 h-12 w-12 rounded-full animate-ping absolute" />
            <img src="../assets/antenna.svg" alt="icon" height="24" width="24">
        </div>
        <div>
            <h1 class="text-2xl font-bold text-green-900">Antena Radar</h1>
            <p v-if="userName">Olá <span class="font-bold text-green-900">{{ userName }}</span>,</p>
            <p class=" text-gray-500">Gerencie e controle sua rede de antenas.</p>
        </div>
    </div>
</template>

<script setup>
import { useUserStore } from "../store/useUser"
import { computed } from 'vue'


const store = useUserStore()
const userName = computed(() => store.getUser)
</script>