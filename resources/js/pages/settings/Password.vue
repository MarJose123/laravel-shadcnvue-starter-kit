<script setup lang="ts">
import { Form, Head } from "@inertiajs/vue3";
import { Button } from "@/components/ui/button";
import {
    Field,
    FieldDescription,
    FieldError,
    FieldGroup,
    FieldLabel,
} from "@/components/ui/field";
import { Input } from "@/components/ui/input";
import { Spinner } from "@/components/ui/spinner";
import AppLayout from "@/layouts/AppLayout.vue";
import SettingsLayout from "@/layouts/SettingsLayout.vue";
import type { TBreadcrumbItem } from "@/types";

const breadcrumbItems: TBreadcrumbItem[] = [
    {
        title: "Settings",
        href: route("profile.edit", {}, false),
    },
    {
        title: "Password",
        href: route("user-password.edit", {}, false),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Password Settings" />

        <h1 class="sr-only">Password Settings</h1>

        <SettingsLayout>
            <Form
                class="space-y-6"
                method="put"
                :action="route('user-password.update')"
                reset-on-success
                :reset-on-error="[
                    'password',
                    'password_confirmation',
                    'current_password',
                ]"
                :options="{
                    preserveScroll: true,
                }"
                v-slot="{ processing, errors, clearErrors }"
            >
                <FieldGroup>
                    <Field
                        :data-invalid="
                            errors.hasOwnProperty('current_password')
                        "
                    >
                        <FieldLabel for="current_password">
                            Password
                        </FieldLabel>
                        <Input
                            name="current_password"
                            id="current_password"
                            type="password"
                            autocomplete="current-password"
                            @update:modelValue="
                                () => clearErrors('current_password')
                            "
                        />
                        <FieldError v-if="errors.current_password">{{
                            errors.current_password
                        }}</FieldError>
                    </Field>
                    <Field :data-invalid="errors.hasOwnProperty('password')">
                        <FieldLabel for="password"> Password </FieldLabel>
                        <Input
                            name="password"
                            id="password"
                            type="password"
                            autocomplete="new-password"
                            @update:modelValue="() => clearErrors('password')"
                        />
                        <FieldDescription>
                            Must be at least 12 characters long.
                        </FieldDescription>
                        <FieldError v-if="errors.password">{{
                            errors.password
                        }}</FieldError>
                    </Field>
                    <Field
                        :data-invalid="
                            errors.hasOwnProperty('password_confirmation')
                        "
                    >
                        <FieldLabel for="confirm-password">
                            Confirm Password
                        </FieldLabel>
                        <Input
                            name="password_confirmation"
                            id="confirm-password"
                            type="password"
                            autocomplete="new-password"
                            @update:modelValue="
                                () => clearErrors('password_confirmation')
                            "
                        />
                        <FieldError v-if="errors.password_confirmation">{{
                            errors.password_confirmation
                        }}</FieldError>
                    </Field>
                </FieldGroup>
                <Button type="submit" :disabled="processing">
                    <Spinner v-if="processing" />
                    Save password
                </Button>
            </Form>
        </SettingsLayout>
    </AppLayout>
</template>

<style scoped></style>
