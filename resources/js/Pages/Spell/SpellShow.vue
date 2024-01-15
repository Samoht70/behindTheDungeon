<script setup>
import Layout from "@/Layouts/Layout.vue";
import {Head, Link, usePage} from "@inertiajs/vue3";
import Title from "@/Components/Title/Title.vue";
import SubTitle from "@/Components/Title/SubTitle.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import BackButton from "@/Components/Button/BackButton.vue";

defineProps({
    spell: {
        type: Object,
        required: true
    }
})

const formatString = (data) => {
    return data.map(item => item.name).join(', ')
}
</script>

<template>
    <Head :title="'Sort ' + spell.name"/>

    <Layout>
        <BackButton content="Page des sorts" />
        <div class="overflow-hidden bg-white shadow rounded-lg m-4">
            <div class="px-4 py-6">
                <Title :title="spell.name" class="!m-0 !no-underline !font-titleMiddleAge"/>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Détails du sort</p>
            </div>

            <section class="border-t border-gray-100">
                <SubTitle title="Description" class="!m-0 !no-underline !font-titleMiddleAge" is-center/>
                <div class="text-gray-800 text-justify space-y-2 px-4 pb-4" v-html="spell.description" />
            </section>

            <section class="border-t border-gray-100">
                <dl class="divide-y-2 divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-xl font-medium font-titleMiddleAge text-red-900">Tags</dt>
                        <dd class="flex items-center mt-1 gap-x-2 sm:col-span-2 sm:mt-0">
                            <template v-for="tag in spell.tags" :key="tag.id">
                                <img :src="'/' + tag.tag_path" :alt="tag.name" class="w-6 h-6" />
                            </template>
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-xl font-medium font-titleMiddleAge text-red-900">Niveau</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ spell.level.level_name === 0 ? 'Tour de magie' : `Level ${spell.level.level_name}` }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-xl font-medium font-titleMiddleAge text-red-900">École</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ spell.school.name }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-xl font-medium font-titleMiddleAge text-red-900">Classes</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ formatString(spell.categories) }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-xl font-medium font-titleMiddleAge text-red-900">Temps d'incantation</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ spell.cast_time }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-xl font-medium font-titleMiddleAge text-red-900">Portée</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ spell.range }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-xl font-medium font-titleMiddleAge text-red-900">Composantes</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ spell.component }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-xl font-medium font-titleMiddleAge text-red-900">Durée</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ spell.duration }}
                        </dd>
                    </div>
                </dl>
            </section>

            <section v-if="spell.upper_lvl" class="border-t border-gray-100">
                <SubTitle title="Niveau supérieur" class="!m-0 !no-underline !font-titleMiddleAge" is-center/>
                <div class="text-gray-800 text-justify space-y-2 px-4 pb-4" v-html="spell.upper_lvl" />
            </section>
        </div>
    </Layout>
</template>

<style scoped>

</style>
