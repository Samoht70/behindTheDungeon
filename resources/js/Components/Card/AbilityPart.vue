<script setup>
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
    }
})

</script>

<template>
    <div class="text-2xl rounded-t-lg flex items-center justify-between">
        <p class="text-white rounded-t-lg font-titleMiddleAge flex items-center gap-x-1 pb-2">
            <font-awesome-icon :icon="['fa-solid', ability.icon]" class="h-5 w-5 text-red-900" aria-hidden="true"/>
            <SubTitle :title="ability.name" class="!p-0"/>
        </p>
        <p class="font-titleMiddleAge" :style="{color: ability.color}">
            {{ ability.pivot.ability_value }}
        </p>
    </div>
    <div class="group relative space-y-4 rounded-lg">
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
