"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const AuthenticatedLayout_1 = __importDefault(require("@/Layouts/AuthenticatedLayout"));
const DeleteUserForm_1 = __importDefault(require("./Partials/DeleteUserForm"));
const UpdatePasswordForm_1 = __importDefault(require("./Partials/UpdatePasswordForm"));
const UpdateProfileInformationForm_1 = __importDefault(require("./Partials/UpdateProfileInformationForm"));
const react_1 = require("@inertiajs/react");
function Edit({ auth, mustVerifyEmail, status }) {
    return (<AuthenticatedLayout_1.default user={auth.user} header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Profile</h2>}>
            <react_1.Head title="Profile"/>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <UpdateProfileInformationForm_1.default mustVerifyEmail={mustVerifyEmail} status={status} className="max-w-xl"/>
                    </div>

                    <div className="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <UpdatePasswordForm_1.default className="max-w-xl"/>
                    </div>

                    <div className="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <DeleteUserForm_1.default className="max-w-xl"/>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout_1.default>);
}
exports.default = Edit;
