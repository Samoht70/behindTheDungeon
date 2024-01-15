<script setup>
import {Head, Link} from "@inertiajs/vue3";
import Layout from "@/Layouts/Layout.vue";
import Title from "@/Components/Title/Title.vue";
import SubTitle from "@/Components/Title/SubTitle.vue";

const resources = [
    {name: 'Aventure', resource: 'adventure'},
    {name: 'Objectif', resource: 'goal'},
    {name: 'Race', resource: 'race'},
    {name: 'Sous-race', resource: 'subRace', withData: true},
    {name: 'Historique', resource: 'background'},
    {name: 'Aptitude', resource: 'feature'},
    {name: 'Attaque', resource: 'attack'},
    {name: 'Arme', resource: 'weapon'},
    {name: 'Maitrise', resource: 'utility'},
]
</script>

<template>
    <Head title="Les resources" />

    <Layout>
        <Title title="Choisis ce que tu veux ajouter" is-center />

        <section class="grid grid-cols-2 items-center justify-center w-4/5 ml-[10%] p-4">
            <SubTitle title="Personnage" is-center />
            <SubTitle title="Autre" is-center />

            <Link :href="route('characters.create')" class="flex justify-center">
                <img
                    :src="$page.props.path.img + '/add_perso.png'"
                    alt="button add perso"
                    class="w-64 border rounded-lg shadow-md p-2 hover:scale-105 transition"
                >
            </Link>

            <div class="grid grid-cols-3 gap-8 font-titleMiddleAge text-xl text-red-800">
                <template v-for="resource in resources" :key="resource.name">
                    <Link
                        :href="route('resources.create', {resource: resource.resource, with_data: resource.withData})"
                        class="shadow-md border rounded-lg text-center p-2 hover:scale-105 transition"
                    >
                        {{ resource.name }}
                    </Link>
                </template>
            </div>
        </section>
    </Layout>
</template>

<style scoped>

</style>
