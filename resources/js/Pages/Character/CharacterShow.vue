<script setup>
import {Head, Link} from "@inertiajs/vue3";
import Layout from "@/Layouts/Layout.vue";
import Tab from "@/Components/Tab/Tab.vue";
import {computed, ref} from "vue";
import TabItem from "@/Components/Tab/TabItem.vue";
import Divider from "@/Components/Divider.vue";
import DataTable from "@/Components/Table/DataTable.vue";
import SubTitle from "@/Components/Title/SubTitle.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import StatistiquesCardList from "@/Components/List/StatistiquesCardList.vue";

const props = defineProps({
    character: {
        type: Object,
        required: true
    }
})

const tabs = [
    {name: 'Informations globales'},
    {name: 'Statistiques'},
    {name: 'Attaques et équipements'},
    {name: 'Compétences et aptitudes'},
    {name: 'Origine'},
]
const selectedTab = ref(tabs[0].name)

const handleSelect = (name) => {
    selectedTab.value = tabs.find(tab => tab.name === name).name
}

const weapons = computed({
    get() {
        return props.character.weapons.map((weapon) => {
            return {
                name: weapon.sub_info ? weapon.name + '*' : weapon.name,
                atk_bonus: '+' + weapon.atk_bonus,
                damage_type: weapon.damage_type
            }
        })
    }
})

const weaponsWithSubInfo = computed({
    get() {
        return props.character.weapons.filter((weapon) => {
            return weapon.sub_info !== null
        })
    }
})

const attacks = computed({
    get() {
        return props.character.attacks
    }
})

const coins = computed({
    get() {
        return props.character.coins.map((coin) => {
            return {
                coin_path: coin.coin_path,
                name: coin.name,
                quantity: coin.pivot.quantity
            }
        })
    }
})
</script>

<template>
    <Head title="Détail personnage"/>

    <Layout>
        <Tab
            type="bar-underline"
            :tabs="tabs"
            :selected-tab="selectedTab"
            @handleSelect="handleSelect"
        />

        <template v-if="selectedTab === 'Informations globales'">
            <TabItem title="Informations globales" title-is-center>
                <template #content>
                    <div class="flex flex-col justify-between items-center p-0 gap-x-4 gap-y-4 sm:p-4 md:flex-row md:gap-y-0">
                        <div class="grid gap-x-4 gap-y-4 grid-cols-2 md:w-2/5 w-full sm:w-4/5">
                            <div class="flex flex-col">
                                <p class="text-gray-500">{{ character.category.name }}</p>
                                <hr class="border border-t-gray-500">
                                <p class="font-titleMiddleAge md:text-xl text-red-900">Classe</p>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-gray-500">{{ character.background.name }}</p>
                                <hr class="border border-t-gray-500">
                                <p class="font-titleMiddleAge md:text-xl text-red-900">Historique</p>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-gray-500">{{ character.subrace.full_name }}</p>
                                <hr class="border border-t-gray-500">
                                <p class="font-titleMiddleAge md:text-xl text-red-900">Race</p>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-gray-500">{{ character.alignment.name }}</p>
                                <hr class="border border-t-gray-500">
                                <p class="font-titleMiddleAge md:text-xl text-red-900">Alignement</p>
                            </div>
                        </div>
                        <div class="md:w-1/2 w-full">
                            <div id="grid-2col"
                                 class="grid grid-cols-3 sm:grid-cols-6 md:grid-cols-3 justify-center gap-y-4">
                                <div class="justify-self-center">
                                    <p class="text-gray-800 text-center">
                                        <font-awesome-icon icon="fa-solid fa-shield-alt" />
                                        <span class="ml-1">{{ character.armor_class }}</span>
                                    </p>
                                    <p class="font-titleMiddleAge text-center text-base md:text-xl text-red-900">Classe d'armure</p>
                                </div>
                                <div class="justify-self-center">
                                    <p class="text-gray-800 text-center">
                                        <font-awesome-icon icon="fa-solid fa-lightbulb" />
                                        <span
                                            v-text="character.initiative >= 0 ? `+${character.initiative}` : character.initiative"
                                            class="ml-1"
                                        />
                                    </p>
                                    <p class="font-titleMiddleAge text-center text-base md:text-xl text-red-900">Initiative</p>
                                </div>
                                <div class="justify-self-center">
                                    <p class="text-gray-800 text-center">
                                        <font-awesome-icon icon="fa-solid fa-person-running" />
                                        <span class="ml-1">{{ character.speed }}m</span>
                                    </p>
                                    <p class="font-titleMiddleAge text-center text-base md:text-xl text-red-900">Vitesse</p>
                                </div>
                                <div class="justify-self-center">
                                    <p class="text-gray-800 text-center">
                                        <font-awesome-icon icon="fa-solid fa-heart" />
                                        <span class="ml-1">{{ character.maximum_hp }}</span>
                                    </p>
                                    <p class="font-titleMiddleAge text-center text-base md:text-xl text-red-900">Points de vie</p>
                                </div>
                                <div class="justify-self-center">
                                    <p class="text-gray-800 text-center">
                                        <font-awesome-icon icon="fa-solid fa-dice-six" />
                                        <span class="ml-1">{{ character.hit_dice }}</span>
                                    </p>
                                    <p class="font-titleMiddleAge text-center text-base md:text-xl text-red-900">Dés de vie</p>
                                </div>
                                <div class="justify-self-center">
                                    <p class="text-gray-800 text-center">
                                        <font-awesome-icon icon="fa-solid fa-book-open" />
                                        <span class="ml-1">{{ character.passive_wisdom }}</span>
                                    </p>
                                    <p class="font-titleMiddleAge text-center text-base md:text-xl text-red-900">Sagesse passive</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <Divider />

                    <div class="text-justify space-y-4 p-4">
                        <div>
                            <p class="font-titleMiddleAge text-xl text-red-900">Traits de personnalité</p>
                            <p class="text-gray-500 sm:indent-4">{{ character.personality_traits }}</p>
                        </div>
                        <div>
                            <p class="font-titleMiddleAge text-xl text-red-900">Idéaux</p>
                            <p class="text-gray-500 sm:indent-4">{{ character.ideals }}</p>
                        </div>
                        <div>
                            <p class="font-titleMiddleAge text-xl text-red-900">Liens</p>
                            <p class="text-gray-500 sm:indent-4">{{ character.bonds }}</p>
                        </div>
                        <div>
                            <p class="font-titleMiddleAge text-xl text-red-900">Défauts</p>
                            <p class="text-gray-500 sm:indent-4">{{ character.flaws }}</p>
                        </div>
                    </div>
                </template>
            </TabItem>
        </template>
        <template v-if="selectedTab === 'Statistiques'">
            <TabItem title="Statistiques" title-is-center>
                <template #content>
                    <StatistiquesCardList
                        :abilities="character.abilities"
                        :skills="character.skills"
                        :savingThrows="character.saving_throws"
                    />
                </template>
            </TabItem>
        </template>
        <template v-if="selectedTab === 'Attaques et équipements'">
            <TabItem title="Attaques et équipements" title-is-center>
                <template #content>
                    <div class="p-4 space-y-4">
                        <DataTable
                            :head-columns="[{name: 'Nom'}, {name: 'Bonus d\'attaque'}, {name: 'Dégât/Type'}]"
                            table-title="Attaques et incantations"
                            :data="weapons"
                        >
                            <template #options v-for="weapon in weaponsWithSubInfo" :key="weapon.id">
                                <div class="flex mt-1" v-html="'*' + weapon.sub_info"/>
                            </template>
                        </DataTable>

                        <div class="space-y-3 w-full">
                            <template v-for="attack in attacks">
                                <div>
                                    <p class="font-bold italic">
                                        {{ attack.name }}.
                                    </p>
                                    <div class="text-justify" v-html="attack.description ?? attack.pivot.other_description"/>
                                </div>
                            </template>
                        </div>

                        <Divider />

                        <div class="sm:flex sm:flex-row sm:space-x-6 md:space-x-10 md:justify-center">
                            <DataTable
                                table-title="Pièces"
                                :data="coins"
                                :head-columns="[{name: ''}, {name: 'Nom'}, {name: 'Quantité'}]"
                                title-is-center
                            />
                            <div class="sm:max-w-[60%]">
                                <SubTitle title="Équipements" is-center />
                                <p
                                    id="equipment"
                                    class="text-justify"
                                    v-html="character.equipment"
                                />
                            </div>
                        </div>
                    </div>
                </template>
            </TabItem>
        </template>
        <template v-if="selectedTab === 'Compétences et aptitudes'">
            <TabItem title="Compétences et aptitudes" title-is-center>
                <template #content>
                    <section>
                        <SubTitle title="Compétences" is-center />
                        <div class="space-y-4">
                            <p>
                                <span class="font-titleMiddleAge text-xl text-red-900">Bonus de maitrise : </span>
                                <span>+{{ character.proficiency_bonus }}</span>
                            </p>
                            <template v-for="utility in character.utilities" :key="utility.id">
                                <p>
                                    <span class="font-titleMiddleAge text-xl text-red-900 mr-1">{{ utility.name }}.</span>
                                    <span>{{ utility.pivot.description }}</span>
                                </p>
                            </template>
                        </div>
                    </section>

                    <Divider />

                    <section>
                        <SubTitle title="Aptitudes" is-center />
                        <div class="space-y-4 text-justify">
                            <template v-for="feature in character.features" :key="feature.id">
                                <p>
                                    <span class="font-titleMiddleAge text-xl text-red-900 mr-1">{{ feature.name }}.</span>
                                    <span v-html="feature.description" />
                                </p>
                            </template>
                        </div>
                    </section>
                </template>
            </TabItem>
        </template>
        <template v-if="selectedTab === 'Origine'">
            <TabItem title="Origine" title-is-center>
                <template #content>
                    <div class="px-4 pt-4 text-justify">
                        <SubTitle :title="character.subrace.race.name" class="!p-0" />

                        <div class="space-y-4 my-1">
                            <div class="sm:indent-4 space-y-1" v-html="character.subrace.race.description" />

                            <template v-if="character.subrace.race.example_surname">
                                <div
                                    class="bg-slate-100 shadow-md rounded p-4 space-y-1"
                                    v-html="character.subrace.race.example_surname"
                                />
                            </template>
                        </div>
                    </div>

                    <div class="px-4 pt-4 text-justify">
                        <template v-if="character.subrace.name">
                            <SubTitle :title="character.subrace.full_name" class="!p-0" />
                        </template>
                        <div class="sm:indent-4 my-1" v-html="character.subrace.description" />
                    </div>

                    <Divider />

                    <div class="px-4 text-justify">
                        <SubTitle :title="character.category.name" class="!p-0" />

                        <div class="space-y-4 my-1">
                            <div class="sm:indent-4 space-y-1" v-html="character.category.description" />
                        </div>
                    </div>

                    <Divider />

                    <div class="px-4 text-justify">
                        <SubTitle title="Historique" class="!p-0" />

                        <div class="sm:px-4 space-y-4">
                            <template v-if="character.character_past">
                                <div class="sm:indent-4 space-y-1 my-1" v-html="character.character_past" />
                            </template>

                            <div class="my-1">
                                <p class="font-titleMiddleAge text-xl text-red-900">
                                    Votre objectif : {{ character.goal.name }}
                                </p>
                                <div class="sm:indent-4 space-y-1" v-html="character.goal.description" />
                            </div>
                            <div>
                                <p class="font-titleMiddleAge text-xl text-red-900">
                                    Alignement : {{ character.alignment.name }}.
                                </p>
                                <div class="sm:indent-4 space-y-1" v-html="character.alignment.description" />
                            </div>
                        </div>
                    </div>
                </template>
            </TabItem>
        </template>
    </Layout>
</template>
