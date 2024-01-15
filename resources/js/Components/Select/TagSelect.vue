<script setup>
import Multiselect from "@vueform/multiselect";
import InputLabel from "@/Components/InputLabel.vue";

defineProps({
    modelValue: {
        type: Array,
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
    label: {
        type: String
    },
    placeholder: {
        type: String
    },
})
defineEmits(['update:modelValue'])
</script>

<template>
    <div>
        <InputLabel v-if="label" :value="label" :for="id" />
        <Multiselect
            :id="id"
            class="mt-1"
            :value="modelValue"
            :options="options"
            @change="$emit('update:modelValue', $event)"
            mode="tags"
            track-by="label"
            :searchable="true"
            placeholder="Sélectionnez vos tags catégories"
        />
    </div>
</template>

<style src="@vueform/multiselect/themes/default.css"></style>
