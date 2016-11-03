<template>
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Bordered Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-condensed table-striped">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Label</th>
                    </tr>

                    <tr v-for="(role, index) in list" :key="role.id" @click="chooseRole(role.id)">
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
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
            </ul>
        </div>
    </div>

</template>

<script>
    export default {
        delimiters: ['${', '}'],

        data: function () {
            return {
                list: [],
                isLoading: false
            }
        },

        methods: {
            getList: function () {
                var self = this, url = laroute.route('rbac::roles.list');

                self.isLoading = true;

                self.$http.post(url).then(response => {
                    self.list = response.data;
                }, response => {

                });
            },

            chooseRole: function (role_id) {
                console.log('Role was sent: ' + role_id);

                this.$store.state.eventBus.$emit('rbac::role-was-chosen', role_id);
            }
        },

        mounted() {
            this.getList();
        }
    }
</script>
