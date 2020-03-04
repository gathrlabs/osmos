<template>
<nav class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
            <div class="flex-shrink-0 items-center inline-flex">
                <img class="h-12 w-12" src="/img/logo.svg" alt="" /> <div class="ml-2 text-3xl text-gray-700 leading-none">osmos</div>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline">
                    <router-link to="/" class="px-3 py-2">Dashboard</router-link>
                    <router-link to="/courses" class="ml-4 px-3 py-2">Courses</router-link>
                    <router-link to="/planner" class="ml-4 px-3 py-2">Planner</router-link>
                    <router-link to="/chat" class="ml-4 px-3 py-2">Chat</router-link>
                    <router-link to="/settings" class="ml-4 px-3 py-2">Settings</router-link>
                </div>
            </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <button class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    </button>
                    <div class="ml-3 relative" x-data="{ open: false }">
                    <div>
                        <button @click="openDropdown = !openDropdown" class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid">
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                        </button>
                    </div>
                    <div v-if="openDropdown" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                        <div class="py-1 rounded-md bg-white shadow-xs">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
            <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            </div>
        </div>
        </div>
        <div @click="open = false" :class="{'block': open, 'hidden': !open}" class="md:hidden bg-gray-100 shadow">
            <div class="px-2 pt-2 pb-3 sm:px-3">
                <router-link to="/" class="block px-3 py-2 rounded text-base text-gray-600 hover:text-white hover:bg-gray-500 focus:outline-none focus:text-white focus:bg-gray-500">Dashboard</router-link>
                <router-link to="/courses" class="block px-3 py-2 rounded text-base text-gray-600 hover:text-white hover:bg-gray-500 focus:outline-none focus:text-white focus:bg-gray-500">Courses</router-link>
                <router-link to="/planner" class="block px-3 py-2 rounded text-base text-gray-600 hover:text-white hover:bg-gray-500 focus:outline-none focus:text-white focus:bg-gray-500">Planner</router-link>
                <router-link to="/chat" class="block px-3 py-2 rounded text-base text-gray-600 hover:text-white hover:bg-gray-500 focus:outline-none focus:text-white focus:bg-gray-500">Chat</router-link>
                <router-link to="/settings" class="block px-3 py-2 rounded text-base text-gray-600 hover:text-white hover:bg-gray-500 focus:outline-none focus:text-white focus:bg-gray-500">Settings</router-link>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-300">
                <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-gray-700">Tom Cook</div>
                    <div class="mt-1 text-sm leading-none text-gray-600">tom@example.com</div>
                </div>
                </div>
                <div class="mt-3 px-2">
                <a href="#" class="block px-3 py-2 rounded text-base text-gray-600 hover:text-white hover:bg-gray-500 focus:outline-none focus:text-white focus:bg-gray-700">Your Profile</a>
                <a href="#" class="mt-1 block px-3 py-2 rounded text-base text-gray-600 hover:text-white hover:bg-gray-500 focus:outline-none focus:text-white focus:bg-gray-700">Settings</a>
                <a href="#" class="mt-1 block px-3 py-2 rounded text-base text-gray-600 hover:text-white hover:bg-gray-500 focus:outline-none focus:text-white focus:bg-gray-700">Sign out</a>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    data() {
        return {
            open: false,
            openDropdown: false,
        }
    },
    methods: {
    }
}
</script>
