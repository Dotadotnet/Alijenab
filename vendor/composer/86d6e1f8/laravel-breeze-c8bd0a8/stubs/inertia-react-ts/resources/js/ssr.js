"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const server_1 = __importDefault(require("react-dom/server"));
const react_1 = require("@inertiajs/react");
const server_2 = __importDefault(require("@inertiajs/react/server"));
const inertia_helpers_1 = require("laravel-vite-plugin/inertia-helpers");
const index_m_1 = __importDefault(require("../../vendor/tightenco/ziggy/dist/index.m"));
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
(0, server_2.default)((page) => (0, react_1.createInertiaApp)({
    page,
    render: server_1.default.renderToString,
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => (0, inertia_helpers_1.resolvePageComponent)(`./Pages/${name}.tsx`, import.meta.glob('./Pages/**/*.tsx')),
    setup: ({ App, props }) => {
        (global.route) = (name, params, absolute) => (0, index_m_1.default)(name, params, absolute, Object.assign(Object.assign({}, page.props.ziggy), { 
            // @ts-expect-error
            location: new URL(page.props.ziggy.location) }));
        return <App {...props}/>;
    },
}));
