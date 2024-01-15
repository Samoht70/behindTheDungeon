<script setup>
defineProps({
    title: {
        type: String,
        required: true
    },
    isCenter: {
        type: Boolean
    }
})
</script>

<template>
    <h2 :class="[isCenter && 'text-center', 'text-xl sm:text-2xl text-red-900 font-titleMiddleAge tracking-wide p-4']">
        {{ title }}
    </h2>
</template>

<style scoped>

</style>
