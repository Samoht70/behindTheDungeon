<script setup>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

const steps = [
    { name: 'Step 1', status: 'complete', icon: 'fa-solid fa-address-card' },
    { name: 'Step 2', status: 'complete', icon: 'fa-solid fa-chart-simple' },
    { name: 'Step 3', status: 'current', icon: 'fa-solid fa-wand-sparkles' },
    { name: 'Step 4', status: 'upcoming', icon: 'fa-solid fa-scroll' },
    { name: 'Step 5', status: 'upcoming', icon: 'fa-solid fa-coins' },
]
</script>

<template>
    <nav aria-label="Progress" class="p-4">
        <ol role="list" class="flex items-center justify-center">
            <li v-for="(step, stepIdx) in steps" :key="step.name" :class="[stepIdx !== steps.length - 1 ? 'pr-4 sm:pr-20' : '', 'relative']">
                <template v-if="step.status === 'complete'">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="h-1 w-full bg-red-800" />
                    </div>
                    <a href="#" class="relative flex h-10 w-10 lg:h-12 lg:w-12 items-center justify-center rounded-full bg-red-800">
                        <font-awesome-icon class="h-5 w-5 lg:h-6 lg:w-6 text-white" aria-hidden="true" icon="fa-solid fa-check" />
                        <span class="sr-only">{{ step.name }}</span>
                    </a>
                </template>

                <template v-else-if="step.status === 'current'">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="h-1 w-full bg-gray-700" />
                    </div>
                    <a
                        href="#"
                        class="relative flex h-10 w-10 lg:h-12 lg:w-12 items-center justify-center rounded-full border-2 border-red-800 bg-red-800"
                        aria-current="step"
                    >
                        <font-awesome-icon class="h-5 w-5 lg:h-6 lg:w-6 text-white" aria-hidden="true" :icon="step.icon" />
                        <span class="sr-only">{{ step.name }}</span>
                    </a>
                </template>

                <template v-else>
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="h-1 w-full bg-gray-700" />
                    </div>
                    <a
                        href="#"
                        class="group relative flex h-10 w-10 lg:h-12 lg:w-12 items-center justify-center rounded-full border-2 border-gray-700 bg-gray-700"
                    >
                        <font-awesome-icon class="h-5 w-5 lg:h-6 lg:w-6 text-white" aria-hidden="true" :icon="step.icon" />
                        <span class="sr-only">{{ step.name }}</span>
                    </a>
                </template>
            </li>
        </ol>
    </nav>
</template>

<style scoped>

</style>
