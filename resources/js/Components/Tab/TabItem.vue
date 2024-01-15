<script setup>
import Title from "@/Components/Title/Title.vue";

defineProps({
    title: {
        type: String,
        required: true
    },
    titleIsCenter: {
        type: Boolean
    }
})
</script>

<template>
    <div class="p-4">
        <Title :title="title" :is-center="titleIsCenter" />

        <slot name="content" />
    </div>
</template>
