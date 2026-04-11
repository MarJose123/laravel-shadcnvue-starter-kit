import { createInertiaApp, http, router } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import type { DefineComponent } from "vue";
import { createApp, h } from "vue";
import { ZiggyVue } from "ziggy-js";
import "../css/app.css";
import { useNotification } from "@/composables/useNotification";
import { initializeTheme } from "./composables/useAppearance";

const { notify } = useNotification();

http.onError((error) => {
    if ([401, 419].includes(Number(error.code))) {
        notify({
            type: "error",
            title: "Session Expired!",
            message: "Your session has expired. Please login again.",
        });
        router.flushAll();
        router.visit(route("login"));
    }
});

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) =>
        resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob<DefineComponent>("./pages/**/*.vue"),
        ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});

// This will set light / dark mode on page load...
initializeTheme();
