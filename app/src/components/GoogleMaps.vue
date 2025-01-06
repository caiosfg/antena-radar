<template>
    <div>
        <GoogleMap :api-key="apiKey" style="width: 100%; height: 150px" :center="{ lat: posLat, lng: posLng }"
            :zoom="15">
            <Marker :options="{ position: { lat: posLat, lng: posLng } }" />
        </GoogleMap>
    </div>
</template>

<script>
import { GoogleMap, Marker } from 'vue3-google-map'

export default {
    name: "DemoComponent",
    props: {
        hasLat: {
            type: String,
            default: null
        },
        hasLng: {
            type: String,
            default: null
        }
    },
    components: {
        GoogleMap,
        Marker
    },
    computed: {
        posLat() {
            return this.hasLat || this.lat;
        },
        posLng() {
            return this.hasLng || this.lng;
        },
    },
    data() {
        return {
            label: 'antenna',
            apiKey: import.meta.env.VITE_GOOGLE_CLOUD_KEY,
            lat: null,
            lng: null,
        }
    },
    created() {
        this.$getLocation()
            .then((coordinates) => {
                console.log(coordinates);
                this.lat = coordinates.lat;
                this.lng = coordinates.lng;
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>