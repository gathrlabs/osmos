<template>
    <div>
        <div class="inline-flex items-center w-full justify-between">
            <div class="text-2xl">Courses</div>
            <div class="hidden md:block">
                <os-button class="transition-shadow bg-gray-900 text-white shadow-lg hover:shadow"  @click="createSession">
                    Create a session
                </os-button>
            </div>
            <div class="block md:hidden transition transform fixed z-100 bottom-0 inset-x-0 pb-2 sm:pb-5" @click="createSession">
                <div class="max-w-screen-xl mx-auto px-2 sm:px-4">
                    <div class="flex items-center justify-between flex-wrap">
                        <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                            <div>
                                <a class="flex items-center justify-center text-lg px-4 py-2 border border-transparent rounded leading-5 text-white rounded-md bg-gray-900">
                                    Create a Session
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
