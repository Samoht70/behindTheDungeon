<script setup>
defineProps({
    modelValue: {
        type: String,
        required: true
    },
    id: {
        type: String,
        required: true
    },
    name: {
        type: String,
        required: true
    },
    placeholder: {
        type: String
    },
})
</script>

<template>
    <EditorElement
        @change="$emit('update:modelValue', $event)"
        :value="modelValue"
        :id="id"
        :name="name"
        :placeholder="placeholder"
        :hide-tools="[
            'italic', 'strike', 'link', 'heading', 'quote', 'code', 'number-list', 'decrease-nesting', 'increase-nesting', 'attach'
        ]"
        :override-classes="{
            EditorElement: {
                input: ['border', 'border-gray-300'],
                input_md: ['rounded-md'],
                input_default: ['bg-white'],
                input_focused: ['border-indigo-500', 'ring-indigo-500', 'ring-1']
            }
        }"
    />
</template>

<style scoped>

</style>
