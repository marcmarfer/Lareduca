<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'flex items-center px-2 border-l-2 border-red-600 transition duration-150 ease-in-out'
        : 'flex items-center px-0 border-transparent transition duration-150 ease-in-out';
});

</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

