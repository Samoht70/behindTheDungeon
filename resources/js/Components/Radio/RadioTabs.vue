<script setup>
defineProps({
    modelValue: {
        type: String,
        required: true
    },
    items: {
        type: Array,
        required: true
    },
})

defineEmits(['update:modelValue'])
</script>

<template>
    <Vueform>
        <RadiogroupElement
            label="Sort de rituel ?"
            name="is_rituel"
            :items="items"
            view="tabs"
        >
            <template v-slot:radio="{ items, index, item, value, classes, id, name }">
                <div
                    class="flex items-center justify-center border py-1.5 w-full"
                    :class="[
                        index < Object.keys(items).length - 1 && 'border-r-0',
                        index === 0 && 'rounded-l-md',
                        index === Object.keys(items).length - 1 && 'rounded-r-md',
                        modelValue === value && 'bg-red-700 text-white border-red-700',
                        modelValue !== value && 'border-gray-300',
                    ]"
                >
                    <input
                        type="radio"
                        :value="value"
                        @change="$emit('update:modelValue', $event.target.value)"
                        :class="classes.input"
                        :name="name"
                        :id="id"
                    />

                    <span
                        :class="classes.text"
                        v-html="item.label"
                    />
                </div>
            </template>
        </RadiogroupElement>
    </Vueform>
</template>

<style scoped>

</style>
