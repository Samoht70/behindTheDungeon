<script setup>
defineEmits(['flipCard'])

defineProps({
    flipped: {
        type: Boolean,
        required: true
    }
})
</script>

<template>
    <slot name="content" />

    <div class="flex justify-end p-2">
        <button
            @click="$emit('flipCard')"
            type="button"
            class="p-1 text-white bg-gray-700 hover:bg-gray-400 focus:outline-none font-medium rounded-full text-center items-center"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg>
        </button>
        <slot name="header" />
    </div>
</template>

<style scoped>

</style>
