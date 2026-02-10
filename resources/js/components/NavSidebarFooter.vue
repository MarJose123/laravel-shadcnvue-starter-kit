<script setup lang="ts">
import {
    SidebarGroup,
    SidebarGroupContent,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from "@/components/ui/sidebar";
import { toUrl } from "@/lib/utils";
import type { INavGroup } from "@/types";

defineProps<{
    items: INavGroup[];
}>();
</script>

<template>
    <SidebarGroup>
        <SidebarGroupContent>
            <SidebarMenu>
                <SidebarMenuItem v-for="item in items" :key="item.title">
                    <SidebarMenuButton
                        as-child
                        size="sm"
                        v-for="subItem in item.items"
                        :key="subItem.title"
                    >
                        <a
                            :href="toUrl(subItem.href!)"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <component :is="subItem.icon" />
                            <span>{{ subItem.title }}</span>
                        </a>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarGroupContent>
    </SidebarGroup>
</template>

<style scoped></style>
