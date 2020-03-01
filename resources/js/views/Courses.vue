<template>
    <div>
        <div class="inline-flex items-center w-full justify-between">
            <div class="text-2xl">Courses</div>
            <div>
                <os-button class="transition-shadow mt-6 bg-gray-900 text-white shadow-lg hover:shadow"  @click="createSession">
                    Create a session
                </os-button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {

        }
    },
    methods: {
        createSession() {
            this.$router.push('/create-session')
        }
    }
}
</script>
