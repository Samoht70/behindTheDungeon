<script setup>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {Link, usePage} from "@inertiajs/vue3";

const urlPrev = usePage().props.urlPrevious

defineProps({
    content: {
        type: String,
    }
})
</script>

<template>
    <Link
        :href="urlPrev"
        class="mx-4 mt-4 flex items-center gap-x-1 font-titleMiddleAge text-xl text-red-900 tracking-wide underline-offset-2 hover:underline"
    >
        <font-awesome-icon icon="fa-solid fa-arrow-left" class="h-5 w-5" />
        {{ content ?? 'Retour' }}
    </Link>
</template>

<style scoped>

</style>
