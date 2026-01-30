<script setup lang="ts">
import type { TBreadcrumbItem } from "@/types";
import AppSidebarLayout from "@/layouts/app/AppSidebarLayout.vue";

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
