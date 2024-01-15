<script setup>
defineProps({
    title: {
        type: String,
        required: true
    },
    isCenter: {
        type: Boolean,
    }
})
</script>

<template>
    <h1
        :class="[
            isCenter && 'text-center',
            'mb-8 text-2xl text-red-900 font-normalMedieval underline underline-offset-2 tracking-wide sm:text-3xl lg:text-4xl'
        ]"
    >
        {{ title }}
    </h1>
</template>

<style scoped>

</style>
