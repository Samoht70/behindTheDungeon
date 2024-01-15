<script setup>
import Layout from "@/Layouts/Layout.vue";
import Title from "@/Components/Title/Title.vue";
import {Head} from "@inertiajs/vue3";
import {useResources} from "@/composables/useResources.js";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextArea from "@/Components/TextArea.vue";
import Toggle from "@/Components/Toggle.vue";
import SingleSelect from "@/Components/Select/SingleSelect.vue";
import TextEditor from "@/Components/TextEditor.vue";
import BackButton from "@/Components/Button/BackButton.vue";

const props = defineProps({
    resource: {
        type: String,
        required: true
    }
})

defineEmits(['update:modelValue'])

const {selectResource} = useResources()
const {races, form, fields, toggle, handleSubmit} = selectResource(props.resource)

</script>

<template>
    <Head :title="'Créer ' + resource" />

    <Layout>
        <template #header>
            <div class="flex items-center">
                <BackButton class="!m-0" />
                <Title :title="'Créer ' + resource" class="!m-0 !no-underline flex-1" is-center />
            </div>
        </template>

        <Vueform :override-classes="{
            FormElements: {
                container: ['flex flex-col justify-center p-4']
            }
        }">
            <template v-for="field in fields" :key="field.name">
                <div>
                    <InputLabel :value="field.label" :for="field.name" />
                    <TextInput
                        v-if="!['select', 'color', 'toggle', 'editor', 'textarea'].includes(field.type)"
                        v-model="form[field.name]"
                        class="w-full"
                        :id="field.name"
                        :type="field.type"
                        :required="field.required"
                        :min="field.min"
                    />
                    <TextArea
                        v-else-if="field.type === 'textarea'"
                        v-model="form[field.name]"
                        :id="field.name"
                        :required="field.required"
                    />
                    <Toggle
                        v-else-if="field.type === 'toggle'"
                        @toggle="toggle"
                        :enabled="form[field.name]"
                        :id="field.name"
                        :required="field.required"
                    />
                    <SingleSelect
                        v-else-if="field.type === 'select'"
                        v-model="form[field.name]"
                        :id="field.name"
                        :name="field.name"
                        :placeholder="field.placeholder"
                        :options="$page.props.races"
                    />
                    <TextEditor
                        v-else-if="field.type === 'editor'"
                        v-model="form[field.name]"
                        :id="field.name"
                        :name="field.name"
                        :placeholder="field.placeholder"
                    />
                </div>
            </template>

            <button
                type="button"
                class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                @click="handleSubmit"
            >
                Ajouter
            </button>
        </Vueform>
    </Layout>
</template>
