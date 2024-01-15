<script setup>
import Layout from "@/Layouts/Layout.vue";
import Title from "@/Components/Title/Title.vue";
import {Head} from "@inertiajs/vue3";
import FlipCard from "@/Components/Card/FlipCard/FlipCard.vue";
import Pagination from "@/Components/Pagination.vue";
import {ref} from "vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import Drawer from "@/Drawer/Drawer.vue";
import {useFilters} from "@/composables/useFilters.js";

const props = defineProps({
    spells: {
        type: Object,
        required: true
    },
    categories: {
        type: Array,
        required: true
    },
    schools: {
        type: Array,
        required: true
    },
    tags: {
        type: Array,
        required: true
    },
    filters: {
        type: Object
    }
})

const open = ref(false)
const handleState = () => {
    open.value = !open.value
}

const {formFilter, filtersCount, resetFilters} = useFilters(props.filters)

</script>

<template>
    <Head title="Sorts"/>

    <Layout>
        <template #header>
            <Title title="Les sorts" class="!m-0 !no-underline" is-center/>
        </template>

        <div class="flex items-center justify-between px-4 mt-6 space-x-4">
            <div class="min-w-[40%]">
                <div class="relative rounded-md shadow-sm">
                    <div
                        class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <font-awesome-icon class="text-gray-400" icon="fa-solid fa-magnifying-glass"/>
                    </div>
                    <input
                        type="search"
                        id="search-spell"
                        name="search"
                        class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Recherche ton sort"
                        v-model="formFilter.search"
                    />
                </div>
            </div>

            <div class="flex items-center space-x-2">
                <button
                    v-if="filtersCount() > 0"
                    class="inline-flex items-center gap-x-2 rounded-full bg-white px-3.5 py-2.5 text-sm font-semibold shadow-sm hover:bg-gray-50 ring-1 ring-inset ring-gray-300"
                    @click="resetFilters()"
                >
                    {{ filtersCount() }}
                    <font-awesome-icon icon="fa-regular fa-circle-xmark" class="w-5 h-5" />
                </button>
                <button
                    type="button"
                    class="inline-flex items-center gap-x-2 rounded-full bg-white px-3.5 py-2.5 text-sm font-semibold shadow-sm hover:bg-gray-50 ring-1 ring-inset ring-gray-300"
                    @click="handleState"
                >
                    Filtrer
                    <font-awesome-icon class="-mr-0.5" icon="fa-solid fa-filter"/>
                </button>
            </div>
        </div>

        <div
            class="w-full px-4 py-6 grid grid-cols-2 gap-y-6 gap-x-4 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:grid-cols-5 xl:gap-x-8">
            <template v-for="spell in spells.data" :key="spell.id">
                <FlipCard href="spells.show" :data="spell">
                    <template #front>
                        <div class="flex justify-between p-2">
                                    <span
                                        class="text-xs text-center font-medium px-2.5 py-0.5 mx-1 rounded"
                                        :style="{color: spell.level.text_color, backgroundColor: spell.level.background_color}"
                                    >
                                        {{ spell.level.level_name === 0 ? 'Tour de magie' : `Level ${spell.level.level_name}` }}
                                    </span>
                        </div>
                        <div class="text-center text-lg font-titleMiddleAge text-slate-100 p-2">
                            {{ spell.name }}
                        </div>
                        <dl class="grid grid-cols-1 gap-x-2 gap-y-6 text-gray-900 p-2">
                            <div class="flex flex-col items-center justify-center">
                                <dt class="text-sm text-slate-100 font-weight-bold">
                                    {{ spell.school.name }}
                                </dt>
                                <dd class="text-xs font-light text-gray-400">
                                    École
                                </dd>
                            </div>
                        </dl>
                    </template>

                    <template #backHeader>
                        <div class="rounded-full h-5 w-5 text-xs flex items-center justify-center"
                             :style="{color: spell.level.text_color, backgroundColor: spell.level.background_color }"
                        >
                            {{ spell.level.level_name }}
                        </div>
                    </template>
                    <template #back>
                        <dl class="grid grid-cols-2 gap-x-2 gap-y-6 text-gray-900 p-2">
                            <div class="flex flex-col items-center justify-center">
                                <dt class="text-sm text-slate-100 font-weight-bold text-center">
                                    {{ spell.is_rituel ? 'Oui' : 'Non' }}
                                </dt>
                                <dd class="text-sm font-light text-gray-400 text-center">Rituel</dd>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <dt class="text-sm text-slate-100 font-weight-bold text-center">
                                    {{ spell.cast_time }}
                                </dt>
                                <dd class="text-sm font-light text-gray-400 text-center">Temps d'incantation</dd>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <dt class="text-sm text-slate-100 font-weight-bold text-center">
                                    {{ spell.range }}
                                </dt>
                                <dd class="text-sm font-light text-gray-400 text-center">Portée</dd>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <dt class="text-sm text-slate-100 font-weight-bold text-center">
                                    {{ spell.duration }}
                                </dt>
                                <dd class="text-sm font-light text-gray-400 text-center">Durée</dd>
                            </div>
                        </dl>
                    </template>
                </FlipCard>
            </template>
        </div>

        <Drawer
            @toggle-state="handleState"
            :open="open"
            :data="{categories, schools, tags}"
            :form="formFilter"
            :filters="formFilter"
        />

        <Pagination :links="spells.links" :pagination="{from: spells.from, to: spells.to, total: spells.total}"/>
    </Layout>
</template>

<style src="@vueform/slider/themes/default.css">

</style>
