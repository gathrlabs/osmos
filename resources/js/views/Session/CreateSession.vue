<template>
    <div class="max-w-6xl mx-auto">
        <div class="text-2xl text-gray-900">Create a New Session</div>
        <section class="flex w-full my-8">
            <div class="bg-white w-full text-grey-dark border-grey-400 border shadow rounded-lg p-4">
                <div class="text-gray-800 text-xl font-bold mb-4">So, you're interested in creating a new Session</div>
                <div class="text-lg leading-normal mb-4">That's great! We want to make sure as many people as possible see your session. We're going to ask a few questions in order to build your session profile page.</div>
                <div class="border-gray-200 border-b my-4"></div>
                <div class=" cursor-pointer rounded hover:bg-gray-200 text-sm leading-normal py-1 px-1 text-gray-800 inline-flex items-center">
                    <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                    <div class="ml-2">Not sure what a session is? Click here to learn more.</div>
                </div>
            </div>
        </section>
        <section class="pt-6">
            <div class="font-bold text-2xl mb-6 text-gray-900">Here's a few pointers on how to make a great and engaging session</div>
            <div class="w-full flex-wrap flex">
                <img class="rounded-lg shadow-lg w-full xl:w-1/2 h-full" src="/img/CreateSessionAssetOne.png" alt="">
                <div class="px-6 w-full mt-6 xl:mt-0 xl:w-1/2">
                    <div class="pb-4">
                        Decide what the general focus of your session will be. For example: Introductory Game Design, Woodworking, Puppetry and Story etc.
                    </div>
                    <div class="py-4">
                        Narrow your focus on the contents of your first session. For example: Building a simple computer game, making a chess board, sharing a story.
                    </div>
                    <div class="py-4">
                        Ensure you have all of the required materials and equipment.
                    </div>
                    <div class="py-4">
                        Decide on what the average appropriate age would be for the session.
                    </div>
                    <os-button class="transition-shadow mt-6 bg-gray-900 text-white shadow-lg hover:shadow" @click="nextPage()">
                        Get Started
                    </os-button>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    methods: {
        nextPage() {
            window.location.href = '/create-session/step-one';
        }
    }
}
</script>
