<script setup>
import {Link} from "@inertiajs/vue3";

defineEmits(['flipCard'])

defineProps({
    flipped: {
        type: Boolean,
        required: true
    },
    data: {
        type: Object,
        required: true
    },
    href: {
        type: String,
        required: true
    }
})
</script>

<template>
    <div class="justify-between flex p-2 items-center">
        <button
            @click="$emit('flipCard')"
            type="button"
            class="p-1 text-white bg-gray-700 hover:bg-gray-400 focus:outline-none font-medium rounded-full text-center items-center"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
            </svg>
        </button>
        <slot name="header" />
    </div>

    <slot name="content" />

    <div class="flex justify-end p-2">
        <Link
            :href="route(href, data)"
            class="text-white font-normalMedieval bg-gray-700 focus:outline-none font-medium text-center hover:underline"
        >
            Plus de détails
        </Link>
    </div>
</template>

<style scoped>

</style>
