<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import GuestLayout from "@/components/GuestLayout.vue";
import SignupForm from "@/components/SignupForm.vue";
</script>
<template>
    <Head title="Register" />
    <GuestLayout
        class="bg-muted flex min-h-svh flex-col items-center justify-center p-6 md:p-10"
    >
        <div class="w-full max-w-sm md:max-w-4xl">
            <SignupForm />
        </div>
    </GuestLayout>
</template>
