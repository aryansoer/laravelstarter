<template>
    <div class="box" :class="['box-' + boxType]">
        <div class="box-header with-border">
            <h3 class="box-title">Roles board</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped roles-table">
                    <thead>
                        <tr>
                            <th style="width: 100px"></th>
                            <th v-for="role in objects.roles">{{ role.display_name }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="perm in objects.permissions">
                            <td>
                                {{ perm.display_name }}
                                <br>
                                <i class="fa fa-question-circle"
                                   data-toggle="tooltip" data-placement="bottom" title=""
                                   :data-original-title="perm.description">
                                </i>
                            </td>

                            <td v-for="(role, i) in objects.roles" @click="updateRolePermission(role, perm)">
                                <i v-show="objects.board[role.name][perm.name]" class="fa fa-check-square-o fa-lg text-success"></i>
                                <i v-show="!objects.board[role.name][perm.name]" class="fa fa-square-o fa-lg text-muted"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="overlay" v-show="isLoading">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div>

</template>

<style>
    .roles-table th, .roles-table td {
        text-align: center;
        vertical-align: middle !important;
        cursor: pointer;

        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .roles-table-td {
        font-size: 18px;
    }
</style>

<script>
    export default {

        props: {
            boxType: {
                type: String,
                default: 'box-default'
            }
        },

        data() {
            return {
                objects: [],
                isLoading: false
            }
        },

        methods: {
            getBoard() {
                let url = laroute.route('rbac::roles.permissions');

                this.isLoading = true;
                this.$http.post(url).then(response => {
                    this.objects = response.data;
                    this.isLoading = false;
                }, response => {
                    toastr.error('An error occurred while getting roles board!');
                    this.isLoading = false;
                });
            },

            updateRolePermission(role, permission) {
                let url = laroute.route('rbac::role.permission', { role : role.id, permission: permission.id });

                this.isLoading = true;
                this.$http.post(url).then(response => {

                    this.objects.board[role.name][permission.name] = ! this.objects.board[role.name][permission.name];
                    this.isLoading = false;

                    toastr.success(response.data.message);
                }, response => {
                    toastr.error('Impossible update roles permission!');
                    this.isLoading = false;
                });
            }
        },

        created() {
            this.$store.state.eventBus.$on('rbac::role-was-created', this.getBoard);
            this.$store.state.eventBus.$on('rbac::permission-was-created', this.getBoard);
        },

        mounted() {
            this.getBoard();
        },
    }
</script>
