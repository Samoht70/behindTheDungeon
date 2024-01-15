<script setup>
import Layout from "@/Layouts/Layout.vue";
import {Head, Link} from "@inertiajs/vue3";
import CategoryCard from "@/Components/Card/CategoryCard.vue";
import Title from "@/Components/Title/Title.vue";

defineProps({
    categories: {
        type: Array,
        required: true
    }
})

</script>

<template>
    <Head title="Classes" />

    <Layout>
        <template #header>
            <Title title="Les classes de personnages" class="!m-0 !no-underline" is-center />
        </template>

        <div class="mx-auto max-w-4xl px-4 py-8 lg:max-w-7xl">
            <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                <template v-for="category in categories" :key="category.id">
                    <CategoryCard :category="category" href="characters.index" />
                </template>
            </div>
        </div>
    </Layout>
</template>
