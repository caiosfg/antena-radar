<template>
    <form class="min-w-80 rounded mx-auto p-8 shadow" @submit.prevent="changeSatellite">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                <input type="text" id="name" v-model="editSatellite.name"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Solar Prime" required />
            </div>
            <div class="col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                <input type="text" id="description" v-model="editSatellite.description"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Antena utilizada nos model..." required />
            </div>
            <div class="mb-5">
                <label for="uf" class="block mb-2 text-sm font-medium text-gray-900">UF</label>
                <select name="uf" id="uf" v-model="editSatellite.uf"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    <option v-for="uf in getUfsIbge" :key="uf.id" :value="uf.sigla">{{ uf.nome }}</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="height" class="block mb-2 text-sm font-medium text-gray-900">Altura</label>
                <input type="number" id="height" min="1" max="100" v-model="editSatellite.height"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="1" required />
            </div>
            <div class="mb-5">
                <label for="active" class="block mb-2 text-sm font-medium text-gray-900">Ativo</label>
                <select name="active" id="active" v-model="editSatellite.active"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    <option :value="true">Sim</option>
                    <option :value="false">Não</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Categoria</label>
                <select name="category" id="category" v-model="editSatellite.category"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="easy">Fácil</option>
                    <option value="medium">Média</option>
                    <option value="hard">Difícil</option>
                </select>
            </div>
            <div class="col-span-4">
                <p class="block mb-2 text-sm font-medium text-gray-900">Foto</p>
                <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm/6">
                        <div class="flex w-0 flex-1 items-center">
                            <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M15.621 4.379a3 3 0 0 0-4.242 0l-7 7a3 3 0 0 0 4.241 4.243h.001l.497-.5a.75.75 0 0 1 1.064 1.057l-.498.501-.002.002a4.5 4.5 0 0 1-6.364-6.364l7-7a4.5 4.5 0 0 1 6.368 6.36l-3.455 3.553A2.625 2.625 0 1 1 9.52 9.52l3.45-3.451a.75.75 0 1 1 1.061 1.06l-3.45 3.451a1.125 1.125 0 0 0 1.587 1.595l3.454-3.553a3 3 0 0 0 0-4.242Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                <span class="truncate font-medium text-ellipsis">{{ editSatellite.avatar }}</span>
                            </div>
                        </div>
                        <label for="avatar"
                            class="ml-4 shrink-0 font-medium text-indigo-600 hover:text-indigo-500 cursor-pointer">Alterar</label>
                        <input type="file" id="avatar" name="avatar" accept="image/*"
                            @change="(event) => handelFileUpload(event)" class="hidden">
                    </li>
                </ul>

            </div>
            <div class="col-span-2">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Localização</label>
                <input type="text" id="location" v-model="editSatellite.location"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Rua olinda menezes, n:12" required />
            </div>
            <div class="mb-5">
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">Data de implantação</label>
                <input type="date" id="start_date" min="2024-01-01" max="2028-12-31" v-model="editSatellite.start_date"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Solar Prime" required />
            </div>
            <div class="mb-5">
                <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900">Data de encerramento</label>
                <input type="date" id="end_date" min="2024-01-01" max="2028-12-31" v-model="editSatellite.end_date"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Solar Prime" required />
            </div>
        </div>
        <button type="submit"
            class="text-white hover:bg-lime-700 focus:ring-4 focus:outline-none focus:ring-lime-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-lime-600">Editar</button>
    </form>
</template>

<script setup>
import { reactive, onMounted, ref } from "vue";
import { useSatellite } from "../store/useSatellite"
import { useRoute, useRouter } from "vue-router";
import axios from "axios";


const editSatellite = reactive({
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

const store = useSatellite();

const route = useRoute();
const router = useRouter();
const imageSrc = ref([]);
const selectedFiles = ref([]);
const getUfsIbge = ref([]);

onMounted(async () => {
    const { data } = await store.fetchSatellitesId(route.params.id)

    if (data) {
        editSatellite.name = data.name;
        editSatellite.description = data.description;
        editSatellite.uf = data.uf;
        editSatellite.avatar = data.avatar;
        editSatellite.location = data.location;
        editSatellite.active = data.active;
        editSatellite.category = data.category;
        editSatellite.start_date = data.start_date;
        editSatellite.end_date = data.end_date;
        editSatellite.height = data.height;
    }


    const ibgeInfo = await axios.get("/ibge/", {
        headers: {
            'Content-Type': 'application/json',
        },
    });

    if (ibgeInfo.data) {
        for (let i = 0; i < ibgeInfo.data.length; i++) {
            getUfsIbge.value.push(ibgeInfo.data[i]);
        }
    }

})

const handelFileUpload = (e) => {
    var files = e.target.files || e.dataTransfer.files;
    if (!files.length) return;

    for (let i = 0; i < files.length; i++) {
        selectedFiles.value.push(files[i]);
        const src = URL.createObjectURL(files[i]);
        imageSrc.value.push(src);
    }

    editSatellite.avatar = imageSrc.value[0];
};

async function changeSatellite() {
    const result = await store.fetchUpdateSatellitesId(route.params.id, editSatellite);

    if (result) {
        router.push({ path: '/antenas' })
    }

}
</script>