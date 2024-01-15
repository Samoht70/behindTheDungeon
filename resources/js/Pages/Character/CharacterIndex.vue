<script setup>
import {Head, Link} from "@inertiajs/vue3";
import Layout from "@/Layouts/Layout.vue";
import FlipCard from "@/Components/Card/FlipCard/FlipCard.vue";
import Title from "@/Components/Title/Title.vue";
import SubTitle from "@/Components/Title/SubTitle.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

defineProps({
    category: {
        type: String,
        required: true
    },
    characters: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <Head title="Personnages" />

    <Layout>
        <template #header>
            <Title :title="`Les ${category}s`" class="!m-0 !no-underline" is-center />
        </template>

        <div class="w-full px-4 py-8 grid grid-cols-2 gap-y-6 gap-x-4 max-[350px]:px-8 max-[350px]:grid-cols-1 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:grid-cols-5 xl:gap-x-8">
                <template v-for="character in characters" :key="character.id">
                    <FlipCard :data="character" href="characters.show">
                        <template #front>
                            <div class="flex justify-between p-2">
                                <template v-for="adventure in character.adventures" :key="adventure.id">
                                    <div>
                                        <span
                                            class="text-xs text-center font-medium px-2.5 py-0.5 mx-1 rounded"
                                            :style="{backgroundColor: adventure.bg_color, color: adventure.text_color}"
                                        >
                                        {{ adventure.abbreviation }}
                                    </span>
                                    </div>
                                </template>
                                <div
                                    class="rounded-full h-12 w-12 m-0 bg-cover"
                                    :style="{backgroundImage: 'url(' + $page.props.path.img + '/races/' + character.subrace.race.name + '.png' + ')'}"
                                ></div>
                            </div>
                            <dl class="grid grid-cols-2 gap-x-2 gap-y-6 text-gray-900 p-2 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <dt class="text-sm text-slate-100 font-weight-bold">{{ character.category.name }}</dt>
                                    <dd class="text-xs font-light text-gray-400">Classe</dd>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <dt class="text-sm text-slate-100 font-weight-bold">{{ character.subrace.race.name }}</dt>
                                    <dd class="text-xs font-light text-gray-400">Race</dd>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <dt class="text-sm text-slate-100 font-weight-bold">{{ character.background.name }}</dt>
                                    <dd class="text-xs font-light text-gray-400">Historique</dd>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <dt class="text-sm text-slate-100 font-weight-bold">{{ character.alignment.name }}</dt>
                                    <dd class="text-xs font-light text-gray-400">Alignement</dd>
                                </div>
                            </dl>
                        </template>

                        <template #back>
                            <div class="grid grid-cols-2 gap-4 p-2">
                                <template v-for="ability in character.abilities">
                                    <div
                                        class="flex items-center justify-center gap-x-2 font-extrabold text-lg"
                                        :style="{color: ability.color}"
                                    >
                                        <font-awesome-icon :icon="['fa-solid', ability.icon]" />
                                        <p>
                                            {{ ability.pivot.ability_value >= 10 ? `+${ability.modifier_ability}` : ability.modifier_ability }}
                                        </p>
                                    </div>
                                </template>
                                <div class="flex items-center justify-center gap-x-2 text-gray-400 font-extrabold">
                                    <font-awesome-icon icon="fa-solid fa-shield-alt" />
                                    <p>{{ character.armor_class }}</p>
                                </div>
                                <div class="flex items-center justify-center gap-x-2 text-gray-400 font-extrabold">
                                    <font-awesome-icon icon="fa-solid fa-lightbulb" />
                                    <p>{{ character.initiative >= 0 ? `${character.initiative}` : character.initiative }}</p>
                                </div>
                                <div class="flex items-center justify-center gap-x-2 text-gray-400 font-extrabold">
                                    <font-awesome-icon icon="fa-solid fa-person-running" />
                                    <p>{{ character.speed }}m</p>
                                </div>
                                <div class="flex items-center justify-center gap-x-2 text-gray-400 font-extrabold">
                                    <font-awesome-icon icon="fa-solid fa-heart" />
                                    <p>{{ character.maximum_hp }}</p>
                                </div>
                            </div>
                        </template>
                    </FlipCard>
                </template>
            </div>
    </Layout>
</template>
