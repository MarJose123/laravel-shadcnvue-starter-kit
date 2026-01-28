<script setup lang="ts">
import { router } from "@inertiajs/vue3";
import { onMounted, onUnmounted, ref } from "vue";
import { toast, Toaster } from "vue-sonner";
import type { Notification } from "@/types/notification";
import "vue-sonner/style.css";

const flashEventListener = ref();

const notify = (notification: Notification | undefined) => {
    if (notification?.type === "error") {
        toast.error(notification.title ?? "", {
            description: notification.message,
            duration: 5000,
        });
    }
    if (notification?.type === "success") {
        toast.success(notification.title ?? "", {
            description: notification.message,
            duration: 5000,
        });
    }
    if (notification?.type === "warning") {
        toast.warning(notification.title ?? "", {
            description: notification.message,
            duration: 5000,
        });
    }
    if (notification?.type === "info") {
        toast.info(notification.title ?? "", {
            description: notification.message,
            duration: 5000,
        });
    }
};

onMounted(() => {
    flashEventListener.value = router.on("flash", (event) => {
        notify(event.detail.flash?.notification);
    });
});

onUnmounted(() => {
    if (flashEventListener.value) {
        flashEventListener.value();
    }
});
</script>

<template>
    <div>
        <slot />
        <Toaster position="bottom-right" />
    </div>
</template>

<style scoped></style>
