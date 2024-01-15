<script setup>
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import {ref} from "vue";
import NavLink from "@/Components/NavLink.vue";

defineProps({
    showingNavigationDropdown: {
        type: Boolean,
        required: true
    },

    navigation: {
        type: Array,
        required: true,
    }
})
</script>

<template>
    <div
        :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
        class="sm:hidden"
    >
        <div class="pt-2 pb-3 space-y-1">
            <template v-for="item in navigation">
                <ResponsiveNavLink :href="route(item.href)" :active="$page.url.includes(item.include)">
                    {{ item.name }}
                </ResponsiveNavLink>
            </template>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200" v-if="$page.props.auth.user">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">
                    {{ $page.props.auth.user.firstname }}
                </div>
                <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <ResponsiveNavLink :href="route('profile.edit', $page.props.auth.user)"> Profile </ResponsiveNavLink>
                <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                    Log Out
                </ResponsiveNavLink>
            </div>
        </div>
        <ResponsiveNavLink v-else :href="route('login')" :active="route().current('login')">
            Log in
        </ResponsiveNavLink>
    </div>
</template>
