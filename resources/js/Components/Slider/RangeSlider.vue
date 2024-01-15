<script setup>
import Slider from "@vueform/slider";
import InputLabel from "@/Components/InputLabel.vue";

defineProps({
    modelValue: {
        type: Array,
        required: true
    },
    id: {
        type: String,
        required: true
    },
    min: {
        type: Number,
        required: true
    },
    max: {
        type: Number,
        required: true
    },
    label: {
        type: String
    },
})

defineEmits(['update:modelValue'])
</script>

<template>
    <div>
        <InputLabel v-if="label" :value="label" :for="id" class="mb-2" />
        <Slider
            :id="id"
            :value="modelValue"
            @change="$emit('update:modelValue', $event)"
            :min="0"
            :max="9"
            tooltipPosition="bottom"
            showTooltip="drag"
        />
    </div>
</template>

<style scoped>

</style>
