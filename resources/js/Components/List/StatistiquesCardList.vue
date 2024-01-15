<script setup>
import AbilityCard from "@/Components/Card/AbilityCard.vue";
import SkillCard from "@/Components/Card/SkillCard.vue";
import SavingThrowCard from "@/Components/Card/SavingThrowCard.vue";

const props = defineProps({
    data: {
        type: Array,
        required: true
    },
    type: {
        type: String,
        required: true
    }
})
</script>

<template>
    <div class="p-2 overflow-hidden rounded-b-lg rounded-tr-lg bg-gray-200 space-y-2 shadow sm:grid sm:grid-cols-3 sm:gap-2 sm:space-y-0">
        <template v-for="(item, index) in data" :key="item.id">
            <AbilityCard
                v-if="type === 'ability'"
                :index="index"
                :ability="item"
                :characterBonus="$page.props.character.proficiency_bonus"
            />

            <SkillCard
                v-else-if="type === 'skill'"
                :index="index"
                :skill="item"
                :ability="$page.props.character.abilities.find(e => e.id === item.ability_id)"
                :characterBonus="$page.props.character.proficiency_bonus"
            />

            <SavingThrowCard
                v-else
                :index="index"
                :savingThrow="item"
                :ability="$page.props.character.abilities.find(e => e.id === item.ability_id)"
                :characterBonus="$page.props.character.proficiency_bonus"
            />
        </template>
    </div>
</template>

<style scoped>

</style>
