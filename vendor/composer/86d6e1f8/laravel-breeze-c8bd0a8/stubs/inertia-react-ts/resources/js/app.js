"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
require("./bootstrap");
require("../css/app.css");
const client_1 = require("react-dom/client");
const react_1 = require("@inertiajs/react");
const inertia_helpers_1 = require("laravel-vite-plugin/inertia-helpers");
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
(0, react_1.createInertiaApp)({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => (0, inertia_helpers_1.resolvePageComponent)(`./Pages/${name}.tsx`, import.meta.glob('./Pages/**/*.tsx')),
    setup({ el, App, props }) {
        const root = (0, client_1.createRoot)(el);
        root.render(<App {...props}/>);
    },
    progress: {
        color: '#4B5563',
    },
});
