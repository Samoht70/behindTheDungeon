<script setup>
import {ref} from "vue";

const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
})

defineEmits(['update:modelValue']);

const input = ref(null);
</script>

<template>
    <textarea
        rows="4"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>

<style scoped>

</style>
