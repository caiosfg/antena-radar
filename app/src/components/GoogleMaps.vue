<template>
    <div>
        <GoogleMap :api-key="apiKey" style="width: 100%; height: 500px" :center="{ lat: lat, lng: lng }" :zoom="15">
            <Marker :options="{ position: { lat: lat, lng: lng } }" />
            <Marker :options="{ position: { lat: lat + 0.001, lng: lng }, label }" />
        </GoogleMap>
    </div>
</template>

<script>
import { GoogleMap, Marker } from 'vue3-google-map'

export default {
    name: "DemoComponent",
    components: {
        GoogleMap,
        Marker
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