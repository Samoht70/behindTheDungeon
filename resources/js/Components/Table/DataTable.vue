<script setup>

import SubTitle from "@/Components/Title/SubTitle.vue";

const props = defineProps({
    headColumns: {
        type: Array,
        required: true
    },
    data: {
        type: Array,
        required: true
    },
    tableTitle: {
        type: String,
        required: true
    },
    titleIsCenter: {
        type: Boolean
    }
})
</script>

<template>
    <div>
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <SubTitle :title="tableTitle" :is-center="titleIsCenter" />
            </div>
        </div>
        <div class="flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <template v-for="(head, index) in headColumns" :key="head.name">
                                    <th
                                        scope="col"
                                        :class="[index === 0 && 'sm:pl-6', 'py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900']"
                                        v-text="head.name"
                                    />
                                </template>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="(item, index) in data" :key="index">
                                <template v-for="([key, value], index) in Object.entries(item)" :key="key">
                                    <td
                                        v-if="key.includes('path')"
                                    >
                                        <img
                                            :src="'/' + value"
                                            alt=""
                                            class="h-10"
                                        >
                                    </td>
                                    <td
                                        v-else
                                        :class="[index === 0 && 'font-bold', 'whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-900']"
                                        v-text="value"
                                    />
                                </template>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <slot name="options" />
    </div>
</template>

<style scoped>

</style>
