<script setup>
import Multiselect from "@vueform/multiselect";
import InputLabel from "@/Components/InputLabel.vue";

defineProps({
    modelValue: {
        type: String,
        required: true
    },
    options: {
        type: Array,
        required: true
    },
    id: {
        type: String,
        required: true
    },
    placeholder: {
        type: String
    },
})
defineEmits(['update:modelValue'])
</script>

<template>
    <Multiselect
        :id="id"
        class="mt-1"
        :value="modelValue"
        :options="options"
        @change="$emit('update:modelValue', $event)"
        track-by="label"
        :searchable="true"
        :placeholder="placeholder"
        :classes="{
            container: 'relative mx-auto w-full flex items-center justify-end cursor-pointer rounded-md bg-white text-base',
            containerActive: 'ring-none',
            search: 'w-full absolute border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-base font-sans rounded-md pl-3.5 rtl:pl-0 rtl:pr-3.5',
        }"
    />
</template>

<style src="@vueform/multiselect/themes/default.css"></style>
