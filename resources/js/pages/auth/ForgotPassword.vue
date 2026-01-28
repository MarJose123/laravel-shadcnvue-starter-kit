<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import ForgotPasswordForm from "@/components/ForgotPasswordForm.vue";
</script>
<template>
    <div
        class="bg-muted flex min-h-svh flex-col items-center justify-center p-6 md:p-10"
    >
        <Head title="Forgot Password" />
        <div class="w-full max-w-sm md:max-w-4xl">
            <ForgotPasswordForm />
        </div>
    </div>
</template>
