<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, router, useForm} from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    errors: {
        type: Object
    }
});

const form = useForm({
    email: 'admin.dragon@gmail.com',
    password: 'DonjonDragon2022!',
    remember: false,
});

const submit = () => {
    router.post('/login', form, {
        onFinish: () => form.reset('password'),
    })
};
</script>

<template>
    <Layout>
        <Head title="Log in" />

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

                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <Checkbox name="remember" v-model:checked="form.remember" />
                            <span class="ms-2 text-sm text-gray-600">Remember me</span>
                        </label>

                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Forgot your password?
                        </Link>
                    </div>

                    <div>
                        <PrimaryButton class="flex w-full justify-center mt-4 text-sm leading-6" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Log in
                        </PrimaryButton>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Pas de compte ?
                    <Link
                        :href="route('register')"
                        className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Inscris-toi maintenant !
                    </Link>
                </p>
            </div>
        </div>
    </Layout>
</template>
