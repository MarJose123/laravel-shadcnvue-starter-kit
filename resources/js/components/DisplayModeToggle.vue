<script setup lang="ts">
import { useHttp } from "@inertiajs/vue3";
import { SunMoon } from "lucide-vue-next";
import { Button } from "@/components/ui/button";
import {
    Tooltip,
    TooltipContent,
    TooltipProvider,
    TooltipTrigger,
} from "@/components/ui/tooltip";
import type { Appearance } from "@/composables/useAppearance";
import { useAppearance } from "@/composables/useAppearance";

const { appearance, updateAppearance } = useAppearance();

const toggleAppearance = (appearance: Appearance) => {
    const http = useHttp({
        mode: "",
    });
    updateAppearance(appearance);
    http.mode = appearance;
    // persist user appearance into the system database
    http.patch(route("appearance.update"))
        .then()
        .catch(() => {
            console.error(
                "Something went wrong while updating user appearance.",
            );
        });
};
</script>

<template>
    <TooltipProvider>
        <Tooltip>
            <TooltipTrigger as-child>
                <Button
                    variant="ghost"
                    class="rounded-full"
                    @click="
                        toggleAppearance(
                            appearance === 'dark' ? 'light' : 'dark',
                        )
                    "
                >
                    <component :is="SunMoon" />
                </Button>
            </TooltipTrigger>
            <TooltipContent>
                <p>Toggle Display Mode (light/dark)</p>
            </TooltipContent>
        </Tooltip>
    </TooltipProvider>
</template>

<style scoped></style>
