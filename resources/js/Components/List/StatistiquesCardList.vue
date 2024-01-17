<script setup>
import AbilityPart from "@/Components/Card/AbilityPart.vue";
import StatCard from "@/Components/Card/StatCard.vue";

const props = defineProps({
    abilities: {
        type: Array,
        required: true
    },
    savingThrows: {
        type: Array,
        required: true
    },
    skills: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <template v-for="ability in abilities" :key="ability.id">
            <StatCard
                :ability="ability"
                :abilitySavingThrow="savingThrows.find(e => e.ability_id === ability.id)"
                :abilitySkills="skills.filter(e => e.ability_id === ability.id)"
            />
        </template>
    </div>
</template>

<style scoped>

</style>
