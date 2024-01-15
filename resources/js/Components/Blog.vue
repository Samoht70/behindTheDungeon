<script setup>
import {Link} from "@inertiajs/vue3";
import dayjs from "dayjs";
import 'dayjs/locale/fr'

defineProps({
    pathImg: {
        type: String,
        required: true
    },
    data: {
        type: Object,
        required: true
    }
})

const date = (date) => {
    const dateFormat = dayjs(date).locale('fr').format('MMMM YYYY');
    return dateFormat[0].toUpperCase() + dateFormat.substring(1)
}
</script>

<template>
    <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 transition ease-in-out duration-500 hover:scale-105 sm:pt-48 lg:pt-80">
        <img :src="pathImg" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover" />
        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40" />
        <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10" />

        <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
            <time class="mr-8">
                {{ date(data.created_at) }}
            </time>
        </div>
        <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
            <Link :href="route('lmop')">
                <span class="absolute inset-0" />
                {{ data.name }}
            </Link>
        </h3>
    </article>
</template>

<style scoped>

</style>
