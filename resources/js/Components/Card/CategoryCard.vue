<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    href: {
        type: String,
        required: true
    },
    category: {
        type: Object,
        required: true
    }
})

</script>

<template>
    <Link :href="route(href, category.id)">
        <div class="relative grayscale transition ease-in-out duration-500 hover:grayscale-0 hover:scale-105">
            <div class="relative h-72 w-full overflow-hidden rounded-lg">
                <img
                    :src="category.picture_path"
                    :alt="category.name"
                    class="h-full w-full object-cover object-center"
                />
            </div>
            <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                <div>
                    <p class="relative text-2xl font-semibold text-right text-white">
                        {{ category.name }}
                    </p>
                    <p class="relative text-lg font-semibold text-white">
                        Personnage(s) : {{ category.characters_count }}
                    </p>
                </div>
            </div>
        </div>
    </Link>
</template>
