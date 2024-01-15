<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import NavBar from "@/Components/navBar/NavBar.vue";
import ResponsiveNavBar from "@/Components/navBar/ResponsiveNavBar.vue";

const navigation = [
    { name: 'Classes', href: 'categories.index', include: 'categories' },
    { name: 'Sorts', href: 'spells.index', include: 'spells' },
    { name: 'Équipements', href: 'home', include: 'equipments' }
]

const showingNavigationDropdown = ref(false);

const toggleNavigationDropdown = () => {
    showingNavigationDropdown.value = !showingNavigationDropdown.value
}
</script>

<template>
    <div class="min-h-screen bg-gray-100 flex flex-col">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <NavBar
                    @toggle="toggleNavigationDropdown"
                    :showing-navigation-dropdown="showingNavigationDropdown"
                    :navigation="navigation"
                />

                <!-- Responsive Navigation Menu -->
                <ResponsiveNavBar
                    :showing-navigation-dropdown="showingNavigationDropdown"
                    :navigation="navigation"
                />
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="isolate relative grow">
                <slot />
            </main>
        </div>
</template>
