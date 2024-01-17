<script setup>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import SubTitle from "@/Components/Title/SubTitle.vue";

const props = defineProps({
    ability: {
        type: Object,
        required: true
    },
    savingThrow: {
        type: Object,
        required: true
    },
    characterBonus: {
        type: Number,
        required: true
    }
})

const savingThrowModifier = () => {
    let modifier = props.ability.modifier_ability

    if (props.savingThrow.pivot.other_modifier_throw && props.savingThrow.pivot.is_proficient) {
        modifier += props.savingThrow.pivot.other_modifier_throw + props.characterBonus;
    } else if (props.savingThrow.pivot.other_modifier_skill) {
        modifier += props.savingThrow.pivot.other_modifier_throw;
    } else if (props.savingThrow.pivot.is_proficient) {
        modifier += props.characterBonus;
    }

    return modifier >= 0 ? `+${modifier}` : modifier;
}

</script>

<template>
    <SubTitle title="Jet de sauvegarde" class="!p-0 !pb-2"/>
    <div class="space-y-2">
        <p class="text-sm text-gray-500">
            <font-awesome-icon icon="fa-solid fa-fire" :style="{color: ability.color}" />
            <span> Modificateur : {{ savingThrowModifier() }}</span>
        </p>
        <p>
            <font-awesome-icon
                :icon="['fa-solid', savingThrow.pivot.is_proficient ? 'fa-circle-check' : 'fa-circle-xmark']"
                :class="savingThrow.pivot.is_proficient ? 'text-green-500' : 'text-red-500'"
            />
            {{ savingThrow.pivot.is_proficient ? 'Maitrisé' : 'Non maitrisé' }}
        </p>
    </div>
</template>
