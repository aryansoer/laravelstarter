<template>
    <div class="box" :class="[boxType]">
        <div class="box-header with-border">
            <h3 class="box-title">Role creator</h3>
        </div>
        <div class="box-body">
            <form role="form" @submit.prevent="onSubmit">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" :class="{'has-error': errors.name }">
                            <label for="role_name">Name</label>
                            <input class="form-control"
                                   v-model.trim="name"
                                   id="role_name"
                                   placeholder="Enter role name"
                                   type="text"
                                   name="role_name"
                                   required
                            >
                            <p class="help-block" v-if="errors.name">
                                {{ errors.name[0] }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" :class="{'has-error': errors.display_name }">
                            <label for="role_display_name">Display name</label>
                            <input class="form-control"
                                   v-model.trim="display_name"
                                   id="role_display_name"
                                   name="role_display_name"
                                   placeholder="Enter label"
                                   type="text"
                                   required
                            >
                            <p class="help-block" v-if="errors.display_name">
                                {{ errors.display_name[0] }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" :class="{'has-error': errors.description }">
                            <label for="role_description">Description</label>
                            <input class="form-control"
                                   v-model.trim="description"
                                   id="role_description"
                                   placeholder="Description here"
                                   type="text"
                                   name="role_description"
                            >
                            <p class="help-block" v-if="errors.description">
                                {{ errors.description[0] }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>-</label>
                            <button type="submit" class="btn btn-success btn-block" :disabled="isLoading || !isFormFilled">
                                <span v-if="!isLoading">
                                    <i class="fa fa-plus"></i> Create
                                </span>
                                <span v-else>
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
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
                name: "",
                display_name: "",
                description: "",

                errors: {},

                isLoading: false
            }
        },

        computed: {
            isFormFilled() {
                return (this.name.length > 0) && (this.display_name.length > 0);
            }
        },

        methods: {
            onSubmit() {
                let url = laroute.route('rbac::roles.store');

                let dataToSend = {
                    name: this.name,
                    display_name: this.display_name,
                    description: this.description
                };

                this.isLoading = true;
                this.$http.post(url, dataToSend).then(response => {
                    toastr.success(response.data.message);

                    this.$store.state.eventBus.$emit('rbac::role-was-created', response.data.role);

                    this.errors = {};
                    this.clearForm();

                    this.isLoading = false;
                }, response => {
                    toastr.error('Please be careful!');

                    this.errors = response.data;
                    this.isLoading = false;
                });
            },

            clearForm() {
               this.name = this.display_name = this.description = "";
            }
        }
    }
</script>
