<template>
    <form class="min-w-80 rounded mx-auto p-6 shadow" @submit.prevent="handleSubmit">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email" v-model="form.email"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="teste@teste.com" required />
            </div>
            <div class="col-span-2">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                <input type="password" id="password" v-model="form.password"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="*******" required />
            </div>
        </div>
        <button type="submit"
            class="text-white mt-6 min-w-full hover:bg-lime-700 focus:ring-4 focus:outline-none focus:ring-lime-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-lime-600">Entrar</button>
    </form>
</template>

<script setup>
import { reactive } from "vue";

const form = reactive({
    email: '',
    password: '',
})

</script>