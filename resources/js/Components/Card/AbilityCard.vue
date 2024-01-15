<script setup>
import {Link} from "@inertiajs/vue3";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import SubTitle from "@/Components/Title/SubTitle.vue";

const props = defineProps({
    ability: {
        type: Object,
        required: true
    },
    characterBonus: {
        type: Number,
        required: true
    },
    index: {
        type: Number,
        required: true
    }
})

</script>

<template>
    <div class="group relative bg-white p-6 space-y-4 rounded-lg">
        <div class="flex justify-between items-center" :style="{color: ability.color}">
            <span class="inline-flex rounded-lg ring-4 ring-white">
                <font-awesome-icon :icon="['fa-solid', ability.icon]" class="h-6 w-6" aria-hidden="true"/>
            </span>
            <span class="font-titleMiddleAge tracking-wide text-2xl">
                {{ ability.pivot.ability_value }}
            </span>
        </div>
        <SubTitle :title="ability.name" class="!p-0" :style="{color: ability.color}"/>
        <div class="space-y-2">
            <p class="text-sm text-gray-500">
                <font-awesome-icon icon="fa-solid fa-fire" :style="{color: ability.color}" />
                <span> Modificateur : {{ ability.modifier_ability >= 0 ? `+${ability.modifier_ability}` : ability.modifier_ability }}</span>
            </p>
            <p class="text-sm text-gray-500">
                <font-awesome-icon icon="fa-solid fa-circle-plus" :style="{color: ability.color}" />
                <span> Bonus : {{ ability.pivot.other_modifier_skill ? `+${ability.pivot.other_modifier_skill}` : '+0'}}</span>
            </p>
        </div>
    </div>
</template>
