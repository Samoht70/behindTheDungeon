<script setup>
import AbilityPart from "@/Components/Card/AbilityPart.vue";
import SavingThrowPart from "@/Components/Card/SavingThrowPart.vue";
import SkilPart from "@/Components/Card/SkilPart.vue";
import {ref} from "vue";
import {TransitionRoot} from "@headlessui/vue";

const props = defineProps({
    ability: {
        type: Object,
        required: true
    },
    abilitySavingThrow: {
        type: Object,
        required: true
    },
    abilitySkills: {
        type: Array,
        required: true
    }
})

const open = ref(false)
</script>

<template>
    <div
        class="p-3 flex flex-col space-y-4 border shadow-sm rounded-lg self-start hover:cursor-pointer border-2"
        :style="{borderColor: ability.color}"
        @click="open = !open"
    >
        <section>
            <AbilityPart
                :ability="ability"
                :characterBonus="$page.props.character.proficiency_bonus"
            />
        </section>
        <TransitionRoot
            :show="open"
            enter="transition-opacity duration-150"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="transition-opacity duration-150"
            leave-from="opacity-100"
            leave-to="opacity-0"
        >
            <section>
                <SavingThrowPart
                    :ability="ability"
                    :savingThrow="abilitySavingThrow"
                    :characterBonus="$page.props.character.proficiency_bonus"
                />
            </section>

            <section v-if="abilitySkills.length > 0">
                <SkilPart
                    :ability="ability"
                    :skills="abilitySkills"
                    :characterBonus="$page.props.character.proficiency_bonus"
                />
            </section>
        </TransitionRoot>
    </div>
</template>

<style scoped>

</style>
