<template>
    <div class="max-w-6xl mx-auto">
        <div class="text-2xl text-gray-900 inline-flex justify-between w-full items-center">
            <div>Create a New Session</div>
            <div class="text-sm">Step 1/4</div>
        </div>
        <section>
            <div class="w-full flex-wrap flex">
                <div class="w-full mt-6">
                    <div class="mb-4 rounded-lg border border-gray-400 shadow p-6 bg-white text-gray-700 cursor-pointer">
                        <div class="mb-4">
                            Tell us which suburb your session in located in and we'll connect you with people who live in and
                            close to your area.
                        </div>
                        <ul class="list-reset">
                            <li>
                                <os-input v-model="suburb" :placeholder="'Suburb or City'"></os-input>
                            </li>
                            <li v-for="place in places">
                                <p class="bg-white border border-gray-300 px-4 py-4 hover:bg-gray-900 hover:text-white">
                                    {{ place.place_name }}
                                </p>
                            </li>
                        </ul>
                    </div>
                    <os-button :disabled="true" class="transition-shadow w-full mt-6 px-6 md:w-auto mt-6 bg-gray-900 text-white shadow-lg hover:shadow" @click="nextPage()">
                        Next Step
                    </os-button>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    data() {
        return {
            suburb: '',
            places: '',
        }
    },
    watch: {
        suburb(newSuburb, oldSuburb) {
            this.search();
        }
   },
    methods: {
        search() {
                axios.post('/places/autocomplete', {
                    place: this.suburb
                })
                .then(response => {
                    this.places = response.data.features;
                })
                .catch(err => {
                    console.log(err);
                })
        },
        nextPage() {
            window.location.href = '/create-session/step-two';
        }
    },
}
</script>
