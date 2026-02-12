<script setup lang="ts">
import { SunMoon } from "lucide-vue-next";
import { Button } from "@/components/ui/button";
import {
    Tooltip,
    TooltipContent,
    TooltipProvider,
    TooltipTrigger,
} from "@/components/ui/tooltip";
import { useAppearance } from "@/composables/useAppearance";

const { appearance, updateAppearance } = useAppearance();
</script>

<template>
    <TooltipProvider>
        <Tooltip>
            <TooltipTrigger as-child>
                <Button
                    variant="ghost"
                    class="rounded-full"
                    @click="
                        updateAppearance(
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
