<template>
    <div class="box" :class="[boxType]">
        <div class="box-header with-border">
            <h3 class="box-title">Roles list</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-condensed table-striped table-hover">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Label</th>
                    </tr>

                    <tr v-for="(role, index) in list" :key="role.id" @click="chooseRole(role)">
                        <td>{{ index+1 }}</td>
                        <td>{{ role.name }}</td>
                        <td>{{ role.display_name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">»</a></li>
            </ul>
        </div>

        <div class="overlay" v-show="isLoading">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div>

</template>

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
                list: [],
                isLoading: false
            }
        },

        methods: {
            getList() {
                let url = laroute.route('rbac::roles.list');

                this.isLoading = true;
                this.$http.post(url).then(response => {
                    this.list = response.data;
                    this.isLoading = false;
                }, response => {
                    this.isLoading = false;
                });
            },
            chooseRole(role) {
                this.$store.state.eventBus.$emit('rbac::role-was-chosen', role);
            },
            appendCreatedRole(role) {
                this.list.push(role)
            }
        },

        created: function () {
            this.$store.state.eventBus.$on('rbac::role-was-created', this.appendCreatedRole);
        },

        mounted() {
            this.getList();
        },
    }
</script>
