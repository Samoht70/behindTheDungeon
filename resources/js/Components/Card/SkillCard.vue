<script setup>
import {Link} from "@inertiajs/vue3";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import SubTitle from "@/Components/Title/SubTitle.vue";

const props = defineProps({
    ability: {
        type: Object,
        required: true
    },
    skill: {
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

const skillModifier = () => {
    let modifier = props.ability.modifier_ability

    if (props.skill.pivot.other_modifier_skill && props.skill.pivot.is_proficient) {
        modifier += props.skill.pivot.other_modifier_skill + props.characterBonus;
    } else if (props.skill.pivot.other_modifier_skill) {
        modifier += props.skill.pivot.other_modifier_skill;
    } else if (props.skill.pivot.is_proficient) {
        modifier += props.characterBonus;
    }

    return modifier >= 0 ? `+${modifier}` : modifier;
}

</script>

<template>
    <div class="group relative bg-white p-6 space-y-4 rounded-lg">
        <div class="flex justify-between items-center" :style="{color: ability.color}">
            <span class="inline-flex rounded-lg ring-4 ring-white">
                <font-awesome-icon :icon="['fa-solid', ability.icon]" class="h-6 w-6" aria-hidden="true"/>
            </span>
        </div>
        <SubTitle :title="`${skill.name} (${ability.name.substring(0, 3)})`" class="!p-0" :style="{color: ability.color}"/>
        <div class="space-y-2">
            <p class="text-sm text-gray-500">
                <font-awesome-icon icon="fa-solid fa-fire" :style="{color: ability.color}" />
                <span> Modificateur : {{ skillModifier() }}</span>
            </p>
            <p>
                <font-awesome-icon
                    :icon="['fa-solid', skill.pivot.is_proficient ? 'fa-circle-check' : 'fa-circle-xmark']"
                    :class="skill.pivot.is_proficient ? 'text-green-500' : 'text-red-500'"
                />
                {{ skill.pivot.is_proficient ? 'Maitrisé' : 'Non maitrisé' }}
            </p>
        </div>
    </div>
</template>
