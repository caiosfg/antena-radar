<template>
    <div class="absolute left-1/2 z-10 mt-5 flex w-screen max-w-max -translate-x-1/2 px-4">
        <div
            class="p-4 w-screen max-w-md flex-auto overflow-hidden rounded-3xl bg-white text-sm/6 shadow-lg ring-1 ring-gray-900/5">
            <div>
                <h3 class="text-base/7 font-semibold text-gray-900 text-center">Confirma a exclusão ?</h3>
                <p class="mt-2 ext-sm font-semibold text-gray-900">Antena Informações</p>
                <div class="flex items-center space-x-2">
                    <img v-if="editSatellite.avatar" class="w-24 h-24 mb-3 rounded-full shadow-lg"
                        :src="editSatellite.avatar" :alt="editSatellite.name" />

                    <div>
                        <p class="max-w-2xl text-sm text-gray-500">{{ editSatellite.name }} - {{
                            editSatellite.description }}</p>
                        <p class="max-w-2xl text-sm text-gray-500">{{ editSatellite.location }} / {{ editSatellite.uf }}
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex mt-6 w-full space-x-1">
                    <RouterLink :to="`/antenas`"
                        class="text-white hover:bg-lime-700 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-lime-600 border-none">
                        Voltar</RouterLink>
                    <button @click="deleteSatellite"
                        class="text-white hover:bg-red-700 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-red-600 border-none">
                        Excluir</button>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive, onMounted } from "vue";
import { useSatellite } from "../store/useSatellite"
import { useRoute, useRouter } from "vue-router";

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

})

const route = useRoute();
const router = useRouter();


async function deleteSatellite() {
    const result = await store.fetchSatelliteRemoveId(route.params.id);
    console.log("🚀 ~ deleteSatellite ~ result:", result)

    if (result === 204) {
        router.push({ path: '/antenas' })
    }

}

</script>