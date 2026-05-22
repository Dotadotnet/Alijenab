"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
require("./bootstrap");
require("../css/app.css");
const vue_1 = require("vue");
const vue3_1 = require("@inertiajs/vue3");
const inertia_helpers_1 = require("laravel-vite-plugin/inertia-helpers");
const vue_m_1 = require("../../vendor/tightenco/ziggy/dist/vue.m");
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
(0, vue3_1.createInertiaApp)({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => (0, inertia_helpers_1.resolvePageComponent)(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        (0, vue_1.createApp)({ render: () => (0, vue_1.h)(App, props) })
            .use(plugin)
            .use(vue_m_1.ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
