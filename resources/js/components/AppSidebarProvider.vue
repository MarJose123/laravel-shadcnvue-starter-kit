<script setup lang="ts">
import { SidebarProvider } from "@/components/ui/sidebar";
</script>

<template>
    <SidebarProvider storage-key="sidebar" :default-open="true">
        <slot />
    </SidebarProvider>
</template>
