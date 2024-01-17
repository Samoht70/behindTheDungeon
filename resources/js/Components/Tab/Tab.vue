<script setup>
defineProps({
    type: {
        type: String,
        required: true
    },
    tabs: {
        type: Array,
        required: true
    },
    selectedTab: {
        type: String,
        required: true
    }
})

defineEmits(['handleSelect'])
</script>

<template>
    <div class="sm:hidden m-4">
        <label for="tabs" class="sr-only">Select a tab</label>
        <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
        <select
            id="tabs"
            name="tabs"
            class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
            @change="(event) => $emit('handleSelect', event.target.value)"
        >
            <option
                v-for="tab in tabs"
                :key="tab.name"
                :selected="selectedTab === tab.name"
                :value="tab.name"
            >
                {{ tab.name }}
            </option>
        </select>
    </div>

    <div v-if="type === 'bar-underline'">
        <div class="hidden sm:block">
            <nav class="isolate flex divide-x divide-gray-200 rounded-lg shadow m-4" aria-label="Tabs">
                <button
                    v-for="(tab, tabIdx) in tabs"
                    :key="tab.name"
                    :class="[
                        tab.current ? 'text-red-900' : 'text-gray-900 hover:text-red-700',
                        tabIdx === 0 ? 'rounded-l-lg' : '',
                        tabIdx === tabs.length - 1 ? 'rounded-r-lg' : '',
                        'group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-sm font-medium hover:bg-gray-50 focus:z-10'
                    ]"
                    :aria-current="selectedTab === tab.name ? 'page' : undefined"
                    @click="$emit('handleSelect', tab.name)"
                >
                    <span>{{ tab.name }}</span>
                    <span
                        aria-hidden="true"
                        :class="[
                            selectedTab === tab.name ? 'bg-red-700' : 'bg-transparent',
                            'absolute inset-x-0 bottom-0 h-0.5'
                        ]"
                    />
                </button>
            </nav>
        </div>
    </div>

    <div v-else-if="type === 'default'">
        <div class="hidden sm:block">
            <nav
                class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200"
                aria-label="Tabs"
            >
                <button
                    v-for="(tab, tabIdx) in tabs"
                    :key="tab.name"
                    :class="[
                        tab.current ? 'text-red-900' : 'text-gray-900 hover:text-red-700',
                        tabIdx === 0 ? 'rounded-tl-lg' : '',
                        tabIdx === tabs.length - 1 ? 'rounded-tr-lg' : '',
                        selectedTab === tab.name ? 'text-red-700' : '',
                        'inline-block p-4 text-gray-700 bg-gray-200'
                    ]"
                    :aria-current="selectedTab === tab.name ? 'page' : undefined"
                    @click="$emit('handleSelect', tabs, tab.name)"
                >
                    <span>{{ tab.name }}</span>
                </button>
            </nav>
        </div>
    </div>
</template>
