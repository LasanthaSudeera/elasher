<template>
    <div class="col-lg-12">
        <div v-if="$can('role_update')" class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div
                        class="
                            card-header
                            d-flex
                            justify-content-between
                            align-items-center
                        "
                    >
                        <h4 class="card-title">Edit Permission Name</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form
                                    method="POST"
                                    @submit.prevent="updatePermission"
                                >
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>User type name</label>
                                            <input
                                                type="text"
                                                class="form-control rounded"
                                                :class="{
                                                    'is-invalid':
                                                        form.errors.has('name'),
                                                }"
                                                v-model="form.name"
                                                placeholder="Example: Manager"
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-if="form.errors.has('name')"
                                                v-html="form.errors.get('name')"
                                            />
                                        </div>
                                    </div>
                                    <!-- <button
                                        :disabled="submit_disabled"
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Update
                                    </button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="$can('role_view')" class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div
                        class="
                            card-header
                            d-flex
                            justify-content-between
                            align-items-center
                        "
                    >
                        <h4 class="card-title">Permissions For The Role</h4>
                    </div>
                    <div class="card-body">
                        <div class="row pt-3">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table
                                        class="
                                            table
                                            table-bordered
                                            table-hover
                                            table-condensed
                                            mb-4
                                        "
                                    >
                                        <thead>
                                            <tr>
                                                <th width="50%">
                                                    Permission Group
                                                </th>
                                                <th
                                                    width="10%"
                                                    class="text-center"
                                                >
                                                    Create
                                                </th>
                                                <th
                                                    width="10%"
                                                    class="text-center"
                                                >
                                                    View
                                                </th>
                                                <th
                                                    width="10%"
                                                    class="text-center"
                                                >
                                                    Update
                                                </th>
                                                <th
                                                    width="10%"
                                                    class="text-center"
                                                >
                                                    Delete
                                                </th>
                                                <th
                                                    width="10%"
                                                    class="text-center"
                                                >
                                                    All
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="user_mgt">
                                                <td>All Permissions</td>
                                                <td
                                                    id="create"
                                                    class="text-center"
                                                ></td>
                                                <td
                                                    id="view"
                                                    class="text-center"
                                                ></td>
                                                <td
                                                    id="update"
                                                    class="text-center"
                                                ></td>
                                                <td
                                                    id="delete"
                                                    class="text-center"
                                                ></td>
                                                <td
                                                    id="all"
                                                    class="text-center"
                                                >
                                                    <div class="n-chk">
                                                        <label
                                                            class="
                                                                new-control
                                                                new-checkbox
                                                                checkbox-primary
                                                            "
                                                        >
                                                            <input
                                                                :disabled="
                                                                    !$can(
                                                                        'role_update'
                                                                    )
                                                                "
                                                                type="checkbox"
                                                                v-model="
                                                                    grant_all
                                                                "
                                                                @change="
                                                                    allCheckHandler
                                                                "
                                                                class="
                                                                    new-control-input
                                                                "
                                                            />
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr
                                                v-for="(
                                                    permission, index
                                                ) in filteredPermission"
                                                :key="index"
                                            >
                                                <td>
                                                    {{ permission.data.name }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="n-chk">
                                                        <label
                                                            class="
                                                                new-control
                                                                new-checkbox
                                                                checkbox-primary
                                                            "
                                                        >
                                                            <input
                                                                :disabled="
                                                                    !$can(
                                                                        'role_update'
                                                                    )
                                                                "
                                                                type="checkbox"
                                                                class="
                                                                    new-control-input
                                                                "
                                                                v-model="
                                                                    permission
                                                                        .permissions
                                                                        .create
                                                                "
                                                                @change="
                                                                    checkArrayForAll(
                                                                        permission
                                                                    )
                                                                "
                                                            />
                                                            <!---->
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="n-chk">
                                                        <label
                                                            class="
                                                                new-control
                                                                new-checkbox
                                                                checkbox-primary
                                                            "
                                                        >
                                                            <input
                                                                :disabled="
                                                                    !$can(
                                                                        'role_update'
                                                                    )
                                                                "
                                                                type="checkbox"
                                                                class="
                                                                    new-control-input
                                                                "
                                                                v-model="
                                                                    permission
                                                                        .permissions
                                                                        .view
                                                                "
                                                                @change="
                                                                    checkArrayForAll(
                                                                        permission
                                                                    )
                                                                "
                                                            />
                                                            <!---->
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="n-chk">
                                                        <label
                                                            class="
                                                                new-control
                                                                new-checkbox
                                                                checkbox-primary
                                                            "
                                                        >
                                                            <input
                                                                :disabled="
                                                                    !$can(
                                                                        'role_update'
                                                                    )
                                                                "
                                                                type="checkbox"
                                                                class="
                                                                    new-control-input
                                                                "
                                                                v-model="
                                                                    permission
                                                                        .permissions
                                                                        .update
                                                                "
                                                                @change="
                                                                    checkArrayForAll(
                                                                        permission
                                                                    )
                                                                "
                                                            />
                                                            <!---->
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="n-chk">
                                                        <label
                                                            class="
                                                                new-control
                                                                new-checkbox
                                                                checkbox-primary
                                                            "
                                                        >
                                                            <input
                                                                :disabled="
                                                                    !$can(
                                                                        'role_update'
                                                                    )
                                                                "
                                                                type="checkbox"
                                                                class="
                                                                    new-control-input
                                                                "
                                                                v-model="
                                                                    permission
                                                                        .permissions
                                                                        .delete
                                                                "
                                                                @change="
                                                                    checkArrayForAll(
                                                                        permission
                                                                    )
                                                                "
                                                            />
                                                            <!---->
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="n-chk">
                                                        <label
                                                            class="
                                                                new-control
                                                                new-checkbox
                                                                checkbox-primary
                                                            "
                                                        >
                                                            <!---->
                                                            <input
                                                                :disabled="
                                                                    !$can(
                                                                        'role_update'
                                                                    )
                                                                "
                                                                type="checkbox"
                                                                class="
                                                                    new-control-input
                                                                "
                                                                @change="
                                                                    changeArrayValues(
                                                                        permission.permissions,
                                                                        permission
                                                                            .data
                                                                            .all
                                                                    );
                                                                    checkArrayForAll(
                                                                        permission
                                                                    );
                                                                "
                                                                v-model="
                                                                    permission
                                                                        .data
                                                                        .all
                                                                "
                                                            />
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table
                                        class="
                                            table
                                            table-bordered
                                            table-hover
                                            table-condensed
                                            mb-4
                                        "
                                    >
                                        <thead>
                                            <th width="80%">
                                                Other Permissions
                                            </th>
                                            <th class="text-center" width="20%">
                                                Availability
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(
                                                    pp, index
                                                ) in singlePhrases"
                                                :key="index"
                                            >
                                                <td>
                                                    {{ pp.name | nameStandard }}
                                                </td>
                                                <td class="text-center">
                                                    <input
                                                        :disabled="
                                                            !$can('role_update')
                                                        "
                                                        type="checkbox"
                                                        class="
                                                            new-control-input
                                                        "
                                                        v-model="
                                                            permissions.other
                                                                .permissions[
                                                                pp.phrase
                                                            ]
                                                        "
                                                        @change="
                                                            checkArrayForAll(
                                                                permissions.other
                                                            )
                                                        "
                                                    />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table
                                        class="
                                            table
                                            table-bordered
                                            table-hover
                                            table-condensed
                                            mb-4
                                        "
                                    >
                                        <thead>
                                            <th width="80%">
                                                Branch Permissions
                                            </th>
                                            <th class="text-center" width="20%">
                                                Branch Code
                                            </th>
                                            <th class="text-center" width="20%">
                                                Availability
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="branch in branches"
                                                :key="branch.id"
                                            >
                                                <td>
                                                    {{ branch.name }}
                                                </td>
                                                <td>{{ branch.code }}</td>
                                                <td class="text-center">
                                                    <input
                                                        :value="branch.id"
                                                        :disabled="
                                                            !$can(
                                                                'branch_update'
                                                            )
                                                        "
                                                        type="checkbox"
                                                        class="
                                                            new-control-input
                                                        "
                                                        v-model="form.branches"
                                                        @change="
                                                            checkArrayForAll(
                                                                permissions.other
                                                            )
                                                        "
                                                    />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table
                                        class="
                                            table
                                            table-bordered
                                            table-hover
                                            table-condensed
                                            mb-4
                                        "
                                    >
                                        <thead>
                                            <th width="80%">
                                                Division Permissions
                                            </th>
                                            <th class="text-center" width="20%">
                                                Division Code
                                            </th>
                                            <th class="text-center" width="20%">
                                                Availability
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="division in divisions"
                                                :key="division.id"
                                            >
                                                <td>
                                                    {{ division.name }}
                                                </td>
                                                <td>{{ division.code }}</td>
                                                <td class="text-center">
                                                    <input
                                                        :value="division.id"
                                                        :disabled="
                                                            !$can(
                                                                'division_update'
                                                            )
                                                        "
                                                        type="checkbox"
                                                        class="
                                                            new-control-input
                                                        "
                                                        v-model="form.divisions"
                                                        @change="
                                                            checkArrayForAll(
                                                                permissions.other
                                                            )
                                                        "
                                                    />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <button
                    v-if="$can('role_update')"
                    @click="updatePermission"
                    :disabled="submit_disabled"
                    type="button"
                    class="btn btn-primary float-right"
                >
                    Update Permissions
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    props: ["role"],
    created() {
        this.form.name = this.role.name;
    },
    mounted() {
        this.getPreviousPermissions();
    },
    data() {
        return {
            form: new Form({
                name: "",
                permissions: {},
                branches: [],
                divisions: [],
            }),

            submit_disabled: false,
            grant_all: false,
            no_prev_permissions: 0,

            CrudPhrases: [
                {
                    key: "user",
                    name: "User Management",
                },
                {
                    key: "role",
                    name: "User Role Management",
                },
                {
                    key: "branch",
                    name: "Branch Management",
                },
                {
                    key: "division",
                    name: "Division Management",
                },
                {
                    key: "hr",
                    name: "Human Resource Management",
                },
                {
                    key: "attendance",
                    name: "Employee Attendance Management",
                },
                {
                    key: "student",
                    name: "Student Management",
                },
                {
                    key: "course",
                    name: "Course Management",
                },
                {
                    key: "batch",
                    name: "Batch Management",
                },
                {
                    key: "crm",
                    name: "CRM Management",
                },
                {
                    key: "payroll",
                    name: "Payroll Management",
                },
                {
                    key: "enrollment",
                    name: "Enrollment Management",
                },
                {
                    key: "zoom",
                    name: "Zoom Management",
                },
                {
                    key: "schedule",
                    name: "Lecturer Schedule Management",
                },
                {
                    key: "report",
                    name: "System Reports Management",
                },
                {
                    key: "payment",
                    name: "Payment Management",
                },
            ],

            singlePhrases: [
                {
                    phrase: "systemNotifications",
                    name: "System Notifications",
                },
                {
                    phrase: "adminDash",
                    name: "Admin Dashboard",
                },
                {
                    phrase: "systemSettings",
                    name: "System Settings",
                },
                {
                    phrase: "crmDash",
                    name: "CRM Dashboard",
                },
            ],
        };
    },
    methods: {
        getPreviousPermissions: async function () {
            try {
                const response = await axios.get(
                    `/api/role/${this.role.id}/permissions`
                );
                const prev_permissions = response.data.permissions;
                for (let i in prev_permissions) {
                    let name = prev_permissions[i].name;
                    let slug = name.split("_"); //Spliting to identify the permission [0]name [1]permission
                    this.no_prev_permissions++;
                    let key = slug[0];
                    let value = slug[1];
                    this.permissions[key].permissions[value] = true;
                    if (
                        this.permissions[key].permissions.create == true &&
                        this.permissions[key].permissions.view == true &&
                        this.permissions[key].permissions.update == true &&
                        this.permissions[key].permissions.delete == true
                    ) {
                        this.permissions[key].data.all = true;
                    }
                }

                this.form.branches = response.data.branches.map((x) => {
                    return x.id;
                });

                this.form.divisions = response.data.divisions.map((x) => {
                    return x.id;
                });

                this.comparePermissionArrayToCheckAll();
                this.$forceUpdate();
            } catch (error) {
                console.log(error);
            }
        },
        updatePermission: async function () {
            try {
                Toast.fire({
                    icon: "info",
                    title: "Please wait!",
                });
                this.submit_disabled = true;
                this.form.permissions = this.permissions;
                const response = await this.form.patch(
                    `/api/role/${this.role.id}/permissions`
                );
                if (response.status == 200) {
                    Toast.fire({
                        icon: "success",
                        title: response.data.message,
                    }).then(() => {
                        this.submit_disabled = false;
                        window.location.href = "/permission";
                    });
                }
            } catch (e) {
                this.submit_disabled = false;
                let errors = e.response.data.errors;
                let myerror = "";
                for (let i in errors) {
                    myerror += " " + errors[i];
                }
                console.log(myerror);
                Toast.fire({
                    icon: "error",
                    title: myerror,
                });
            }
        },
        changeArrayValues: function (array, value) {
            for (let i in array) {
                array[i] = value;
            }
            this.$forceUpdate();
        },
        allCheckHandler: function () {
            for (let i in this.permissions) {
                for (let j in this.permissions[i].permissions) {
                    this.permissions[i].permissions[j] = this.grant_all;
                }
                this.permissions[i].data.all = this.grant_all;
            }

            if (this.grant_all) {
                this.form.branches = this.branches.map((x) => {
                    return x.id;
                });

                this.form.divisions = this.divisions.map((x) => {
                    return x.id;
                });
            } else {
                this.form.branches = [];
                this.form.divisions = [];
            }
            this.$forceUpdate();
        },
        checkArrayForAll: function (array) {
            if (
                array.permissions.create == true &&
                array.permissions.view == true &&
                array.permissions.update == true &&
                array.permissions.delete == true
            ) {
                array.data.all = true;
            } else {
                array.data.all = false;
                this.grant_all = false;
            }
            this.comparePermissionArrayToCheckAll();
            this.$forceUpdate();
        },
        comparePermissionArrayToCheckAll: function () {
            let no_permission_objects = 0;
            let available_permission = 0;
            for (let i in this.permissions) {
                for (let j in this.permissions[i].permissions) {
                    no_permission_objects++;
                    if (this.permissions[i].permissions[j] == true) {
                        available_permission++;
                    }
                }
            }
            if (
                no_permission_objects +
                    this.branches.length +
                    this.divisions.length ==
                available_permission +
                    this.form.branches.length +
                    this.form.divisions.length
            ) {
                this.grant_all = true;
            } else {
                this.grant_all = false;
            }
        },
    },

    computed: {
        ...mapGetters("auth", {
            branches: "getBranches",
            divisions: "getDivisions",
        }),

        permissions() {
            let permissions = {};
            this.CrudPhrases.map((x) => {
                permissions[x.key] = {
                    data: {
                        all: false,
                        name: x.name,
                        phrase: x.key + "_",
                    },
                    permissions: {
                        create: false,
                        view: false,
                        update: false,
                        delete: false,
                    },
                };
            });

            let other = {
                data: {
                    all: false,
                    name: "Other Settings",
                    phrase: "other_",
                },
                permissions: {},
            };

            this.singlePhrases.map((x) => {
                other.permissions[x.phrase] = false;
            });

            let allPermissions = Object.assign(permissions, {
                other,
            });
            return allPermissions;
        },

        selectedModel() {
            let model = {};
            this.CrudPhrases.map((x) => {
                model[x.key] = null;
            });
            return model;
        },

        filteredPermission: function () {
            var result = _.pick(this.permissions, _.keys(this.selectedModel));
            return result;
        },
    },
};
</script>
