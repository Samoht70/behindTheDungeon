<script setup>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import SubTitle from "@/Components/Title/SubTitle.vue";

const props = defineProps({
    ability: {
        type: Object,
        required: true
    },
    skills: {
        type: Object,
        required: true
    },
    characterBonus: {
        type: Number,
        required: true
    }
})

const skillModifier = (skill) => {
    let modifier = props.ability.modifier_ability

    if (skill.pivot.other_modifier_skill && props.skill.pivot.is_proficient) {
        modifier += skill.pivot.other_modifier_skill + props.characterBonus;
    } else if (skill.pivot.other_modifier_skill) {
        modifier += skill.pivot.other_modifier_skill;
    } else if (skill.pivot.is_proficient) {
        modifier += props.characterBonus;
    }

    return modifier >= 0 ? `+${modifier}` : modifier;
}

</script>

<template>
    <SubTitle title="Compétences" class="!p-0 !pb-2"/>

    <section class="space-y-2">
        <template v-for="skill in skills" :key="skill.id">
            <div>
                <p class="font-bold">
                    {{ skill.name }}
                </p>
                <div class="space-y-2">
                    <p class="text-sm text-gray-500">
                        <font-awesome-icon icon="fa-solid fa-fire" :style="{color: ability.color}" />
                        <span> Modificateur : {{ skillModifier(skill) }}</span>
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
    </section>
</template>
