<script setup lang="ts">
import AppSidebarLayout from "@/layouts/app/AppSidebarLayout.vue";
import type { TBreadcrumbItem } from "@/types";

type Props = {
    breadcrumbs?: TBreadcrumbItem[];
};

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppSidebarLayout :breadcrumbs="breadcrumbs">
        <slot />
    </AppSidebarLayout>
</template>

<style scoped></style>
