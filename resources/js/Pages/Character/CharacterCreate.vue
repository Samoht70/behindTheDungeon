<script setup>
import {Head, Link} from "@inertiajs/vue3";
import Layout from "@/Layouts/Layout.vue";
import Title from "@/Components/Title/Title.vue";
import Stepper from "@/Components/Stepper.vue";

defineProps()
</script>

<template>
    <Head title="Création personnage" />

    <Layout>
        <template #header>
            <Title title="Créez ton personnage" class="!m-0 !no-underline" is-center />
        </template>

        <Stepper />
    </Layout>
</template>
