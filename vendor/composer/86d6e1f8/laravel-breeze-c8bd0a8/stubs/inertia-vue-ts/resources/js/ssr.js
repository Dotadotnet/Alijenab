"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const vue_1 = require("vue");
const server_renderer_1 = require("@vue/server-renderer");
const vue3_1 = require("@inertiajs/vue3");
const server_1 = __importDefault(require("@inertiajs/vue3/server"));
const inertia_helpers_1 = require("laravel-vite-plugin/inertia-helpers");
const vue_m_1 = require("../../vendor/tightenco/ziggy/dist/vue.m");
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
(0, server_1.default)((page) => (0, vue3_1.createInertiaApp)({
    page,
    render: server_renderer_1.renderToString,
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => (0, inertia_helpers_1.resolvePageComponent)(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ App, props, plugin }) {
        return (0, vue_1.createSSRApp)({ render: () => (0, vue_1.h)(App, props) })
            .use(plugin)
            .use(vue_m_1.ZiggyVue, Object.assign(Object.assign({}, page.props.ziggy), { location: new URL(page.props.ziggy.location) }));
    },
}));
