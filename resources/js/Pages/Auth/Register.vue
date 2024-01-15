<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, router, useForm} from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";

defineProps({
    errors: {
        type: Object
    }
})

const form = useForm({
    firstname: '',
    lastname: '',
    email: '',
    password: '',
});

const submit = () => {
    router.post('/register', form, {
        onFinish: () => form.reset('password'),
    })
};
</script>

<template>
    <Layout>
        <Head title="Register" />

        <div class="h-full flex flex-col sm:justify-center items-center pt-6 bg-gray-100">
            <div class="space-y-8 sm:w-full sm:max-w-lg px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
                <div>
                    <img
                        class="mx-auto h-24 w-auto"
                        :src="$page.props.path.logo"
                        alt="Your Company"
                    />
                </div>

                <form @submit.prevent="submit" class="space-y-6">
                    <div class="relative space-y-3">
                        <div>
                            <InputLabel for="firstname" value="Firstname" class="sr-only" />
                            <TextInput
                                id="firstname"
                                type="text"
                                placeholder="Firstname"
                                class="mt-1 block w-full"
                                v-model="form.firstname"
                                autofocus
                            />
                            <InputError v-if="errors.firstname" class="mt-2" :message="errors.firstname" />
                        </div>

                        <div>
                            <InputLabel for="lastname" value="Lastname" class="sr-only" />
                            <TextInput
                                id="lastname"
                                type="text"
                                placeholder="Lastname"
                                class="mt-1 block w-full"
                                v-model="form.lastname"
                                autofocus
                                autocomplete="username"
                            />
                            <InputError v-if="errors.lastname" class="mt-2" :message="errors.lastname" />
                        </div>

                        <div>
                            <InputLabel for="email" value="Email" class="sr-only" />
                            <TextInput
                                id="email"
                                type="email"
                                placeholder="Adresse mail"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                autofocus
                                autocomplete="username"
                            />
                            <InputError v-if="errors.email" class="mt-2" :message="errors.email" />
                        </div>

                        <div>
                            <InputLabel for="password" value="Password" class="sr-only" />
                            <TextInput
                                id="password"
                                type="password"
                                placeholder="Password"
                                class="mt-1 block w-full"
                                v-model="form.password"
                                autocomplete="current-password"
                            />
                            <InputError v-if="errors.password" class="mt-2" :message="errors.password" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <Link
                            :href="route('login')"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Déjà un compte ?
                        </Link>

                        <PrimaryButton class="ml-4" :disabled="form.processing">
                            S'inscrire
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>
