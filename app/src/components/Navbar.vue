<template>
    <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
        <RouterLink to="/" class="flex items-center flex-shrink-0 text-white mr-6">
            <img src="../assets/antenna.svg" alt="icon antenna" height="40" width="40">
            <span class="font-semibold text-xl tracking-tight">Antena Radar</span>
        </RouterLink>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                <RouterLink to="/antenas"
                    class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Antenas
                </RouterLink>
                <RouterLink to="/adicionar-antena"
                    class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Adicionar
                </RouterLink>
            </div>
            <div class="space-x-2">
                <RouterLink v-if="!userName" to="/login"
                    class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">
                    Login
                </RouterLink>
                <RouterLink v-if="!userName" to="/register"
                    class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-white hover:bg-blue-500 mt-4 lg:mt-0">
                    Register
                </RouterLink>
                <RouterLink v-if="userName" to="/logout"
                    class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-white hover:bg-red-500 mt-4 lg:mt-0">
                    Logout
                </RouterLink>
            </div>
        </div>
    </nav>
</template>


<script setup>
import { useUserStore } from "../store/useUser"
import { computed } from 'vue'


const store = useUserStore()
const userName = computed(() => store.getUser)
</script>