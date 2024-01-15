<script setup>
import {ref} from "vue";
import BackCard from "@/Components/Card/FlipCard/BackCard.vue";
import FrontCard from "@/Components/Card/FlipCard/FrontCard.vue";
import "animate.css"

defineProps({
    data: {
        type: Object,
        required: true
    },
    href: {
        type: String,
        required: true
    }
})

const flipped = ref(false)

const toggleFlipped = () => {
    flipped.value = !flipped.value
}
</script>

<template>
    <div
        class="w-full min-h-[20rem] rounded-lg bg-gray-700 flex flex-col justify-between"
    >
        <template v-if="!flipped">
            <FrontCard
                @flipCard="toggleFlipped"
                flipped
            >
                <template #header>
                    <slot name="frontHeader" />
                </template>
                <template #content>
                    <slot name="front"/>
                </template>
            </FrontCard>
        </template>

        <template v-else>
            <BackCard
                @flipCard="toggleFlipped"
                flipped
                :data="data"
                :href="href"
            >
                <template #header>
                    <slot name="backHeader" />
                </template>
                <template #content>
                    <slot name="back"/>
                </template>
            </BackCard>
        </template>
    </div>
</template>

<style scoped>
</style>
