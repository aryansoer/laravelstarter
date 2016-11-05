<template lang="html">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created: function () {
            this.$store.state.eventBus.$on('rbac::role-was-chosen', this.processRole);
        },

        mounted() {
            console.log('I\'m  ready sir!');
        },

        methods: {
            checkMessage: function (message) {
                console.log(message);
            },

            processRole: function (role_id) {
                console.log('I\'v caught role id: ' + role_id);
            }
        }
    }
</script>
