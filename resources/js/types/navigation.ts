import type { InertiaLinkProps } from "@inertiajs/vue3";
import type { LucideIcon } from "lucide-vue-next";

export type TBreadcrumbItem = {
    title: string;
    href?: string;
};

export type TNavItem = {
    title: string;
    href: NonNullable<InertiaLinkProps["href"]>;
    icon?: LucideIcon;
};

export type TNavGroup = {
    title: string;
    icon?: LucideIcon;
    type: "group"
    items: TNavItem[];
};

export type TNav = {
    title: string;
    items: TNavGroup[] | TNavItem[];
}

export type TSidebarNavigationItems = TNav[];

