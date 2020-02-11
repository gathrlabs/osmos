<template>
    <div>
        <div class="text-2xl text-black-500">Dashboard</div>
        <section class="flex w-full my-8">
            <div class="bg-blue-100 h-32 w-full text-grey-dark rounded-lg p-6">
                <div class="text-blue-300 text-xl font-bold mb-4">Welcome back Tom</div>
                <div class="text-lg">As this is your first visit, would you like a quick tour?</div>
            </div>
        </section>
        <section>
            <card title="Latest Courses">
                <template v-slot:body class="w-full flex">
                    <div class="w-full inline-flex items-center border-b border-gray-100 py-4">
                        <div class="font-bold py-2">Guide To International Politics</div>
                        <div class="py-2">Dave Hill</div>
                    </div>
                </template>
            </card>
        </section>
    </div>
</template>
<script>
export default {
}
</script>
