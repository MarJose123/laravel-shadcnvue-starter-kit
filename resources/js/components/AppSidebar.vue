<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { Command, LifeBuoy, Send, Settings2 } from "lucide-vue-next";
import NavMain from "@/components/NavMain.vue";
import NavSidebarFooter from "@/components/NavSidebarFooter.vue";
import NavUser from "@/components/NavUser.vue";
import type { SidebarProps } from "@/components/ui/sidebar";

import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from "@/components/ui/sidebar";
import type { TSidebarNavigationItems } from "@/types";

const props = withDefaults(defineProps<SidebarProps>(), {
    variant: "inset",
});

const navigation: TSidebarNavigationItems = [
    {
        title: "Platform",
        items: [
            {
                title: "Dashboard",
                href: route("dashboard", {}, false),
                icon: Command,
            },
            {
                title: "Settings",
                icon: Settings2,
                items: [
                    {
                        title: "General",
                        href: "#",
                    },
                ],
            },
        ],
    },
];

const footerNavigation: TSidebarNavigationItems = [
    {
        items: [
            {
                title: "Support",
                href: "#",
                icon: LifeBuoy,
            },
            {
                title: "Feedback",
                href: "#",
                icon: Send,
            },
        ],
    },
];
</script>

<template>
    <Sidebar v-bind="props">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link href="#">
                            <div
                                class="flex aspect-square size-8 items-center justify-center rounded-lg bg-sidebar-primary text-sidebar-primary-foreground"
                            >
                                <Command class="size-4" />
                            </div>
                            <div
                                class="grid flex-1 text-left text-sm leading-tight"
                            >
                                <span class="truncate font-medium"
                                    >Acme Inc</span
                                >
                                <span class="truncate text-xs">Enterprise</span>
                            </div>
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="navigation" />
            <NavSidebarFooter :items="footerNavigation" class="mt-auto" />
        </SidebarContent>
        <SidebarFooter>
            <NavUser />
        </SidebarFooter>
    </Sidebar>
</template>
