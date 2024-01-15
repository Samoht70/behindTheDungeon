<script setup>
import { Head } from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";
import Blog from "@/Components/Blog.vue";
import Header from "@/Components/Header.vue";

const props = defineProps({
    path: {
        type: Object,
        required: true
    },
    adventures: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <Head title="Accueil" />

    <Layout>
        <Header />
    </Layout>
</template>
