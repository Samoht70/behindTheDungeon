<script setup>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot} from "@headlessui/vue";
import {useFilters} from "@/composables/useFilters.js";
import TagSelect from "@/Components/Select/TagSelect.vue";
import RangeSlider from "@/Components/Slider/RangeSlider.vue";
import RadioTabs from "@/Components/Radio/RadioTabs.vue";

const props = defineProps({
    open: {
        type: Boolean,
        required: true
    },
    data: {
        type: Object,
        required: true
    },
    form: {
        type: Object,
        required: true
    },
    filters: {
        type: Object,
        required: true
    }
})

defineEmits(['toggle-state'])

</script>

<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="$emit('toggle-state')">
            <div class="fixed inset-0"/>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <TransitionChild
                            as="template"
                            enter="transform transition ease-in-out duration-500 duration-700"
                            enter-from="translate-x-full"
                            enter-to="translate-x-0"
                            leave="transform transition ease-in-out duration-500 duration-700"
                            leave-from="translate-x-0"
                            leave-to="translate-x-full"
                        >
                            <DialogPanel class="pointer-events-auto w-screen max-w-md">
                                <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                                    <div class="px-4 sm:px-6">
                                        <div class="flex items-start justify-between">
                                            <DialogTitle class="text-base font-semibold leading-6 text-gray-900">
                                                Filtres
                                            </DialogTitle>
                                            <div class="ml-3 flex h-7 items-center">
                                                <button
                                                    type="button"
                                                    class="relative rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none"
                                                    @click="$emit('toggle-state')"
                                                >
                                                    <span class="absolute -inset-2.5"/>
                                                    <span class="sr-only">Close panel</span>
                                                    <font-awesome-icon icon="fa-solid fa-xmark"/>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative mt-6 flex-1 px-6 space-y-6">
                                        <TagSelect
                                            v-model="form.categories"
                                            :options="data.categories"
                                            id="categories"
                                            placeholder="Sélectionnez vos catégories"
                                            label="Catégories"
                                        />
                                        <TagSelect
                                            v-model="form.schools"
                                            :options="data.schools"
                                            id="schools"
                                            placeholder="Sélectionnez vos écoles de magie"
                                            label="Écoles de magie"
                                        />
                                        <TagSelect
                                            v-model="form.tags"
                                            :options="data.tags"
                                            id="tags"
                                            placeholder="Sélectionnez vos tags"
                                            label="Tags"
                                        />
                                        <RangeSlider
                                            id="level"
                                            v-model="form.level"
                                            :min="0"
                                            :max="0"
                                            label="Level de sort"
                                        />
                                        <RadioTabs
                                            :items="[
                                                {value: 'true', label: 'Oui'},
                                                {value: 'false', label: 'Non'},
                                                {value: 'both', label: 'Les deux'}
                                            ]"
                                            v-model="form.is_rituel"
                                        />
                                    </div>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<style src="@vueform/multiselect/themes/default.css"></style>
