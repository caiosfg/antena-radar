<template>
    <form class="min-w-80 rounded mx-auto p-8 shadow" @submit.prevent="addSatellite">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                <input type="text" id="name" v-model="newSatellite.name"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Solar Prime" required />
            </div>
            <div class="col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                <input type="text" id="description" v-model="newSatellite.description"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Antena utilizada nos model..." required />
            </div>
            <div class="mb-5">
                <label for="uf" class="block mb-2 text-sm font-medium text-gray-900">UF</label>
                <select name="uf" id="uf" v-model="newSatellite.uf"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="rj">RJ</option>
                    <option value="sp">SP</option>
                    <option value="bh">BH</option>
                    <option value="mg">MG</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="height" class="block mb-2 text-sm font-medium text-gray-900">Altura</label>
                <input type="number" id="height" min="1" max="100" v-model="newSatellite.height"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="1" required />
            </div>
            <div class="mb-5">
                <label for="active" class="block mb-2 text-sm font-medium text-gray-900">Ativo</label>
                <select name="active" id="active" v-model="newSatellite.active"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    <option :value="true">Sim</option>
                    <option :value="false">Não</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Categoria</label>
                <select name="category" id="category" v-model="newSatellite.category"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="easy">Fácil</option>
                    <option value="medium">Média</option>
                    <option value="hard">Difícil</option>
                </select>
            </div>
            <div class="col-span-4">
                <label for="avatar" class="block mb-2 text-sm font-medium text-gray-900">Foto</label>
                <input type="file" id="avatar" name="avatar" accept="image/*"
                    @change="(event) => handelFileUpload(event)"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="col-span-2">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Localização</label>
                <input type="text" id="location" v-model="newSatellite.location"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Rua olinda menezes, n:12" required />
            </div>
            <div class="mb-5">
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">Data de implantação</label>
                <input type="date" id="start_date" min="2024-01-01" max="2028-12-31" v-model="newSatellite.start_date"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Solar Prime" required />
            </div>
            <div class="mb-5">
                <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900">Data de encerramento</label>
                <input type="date" id="end_date" min="2024-01-01" max="2028-12-31" v-model="newSatellite.end_date"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Solar Prime" required />
            </div>
        </div>
        <button type="submit"
            class="text-white hover:bg-lime-700 focus:ring-4 focus:outline-none focus:ring-lime-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-lime-600">Cadastrar</button>
    </form>
</template>

<script setup>
import { reactive, ref } from "vue";
import { createSatellite } from "../api/satellite-api";
import { useRouter } from "vue-router";


const newSatellite = reactive({
    name: '',
    description: '',
    uf: '',
    avatar: null,
    location: '',
    active: false,
    category: null,
    start_date: '',
    end_date: '',
    height: '',
})

const router = useRouter();
const imageSrc = ref([]);
const selectedFiles = ref([]);

async function addSatellite() {
    const result = await createSatellite(newSatellite);

    if (result) {
        router.push({ path: '/antenas' })
    }

}

const handelFileUpload = (e) => {
    var files = e.target.files || e.dataTransfer.files;
    if (!files.length) return;

    for (let i = 0; i < files.length; i++) {
        selectedFiles.value.push(files[i]);
        const src = URL.createObjectURL(files[i]);
        imageSrc.value.push(src);
    }

    newSatellite.avatar = imageSrc.value[0];

};
</script>