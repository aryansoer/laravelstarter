<template>
    <div class="box" :class="[boxType]">
        <div class="box-body">
            <form role="form" @submit.prevent="onSubmit">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" :class="{'has-error': errors.name }">
                            <label for="user_name">Name</label>
                            <input class="form-control"
                                   v-model.trim="name"
                                   id="user_name"
                                   placeholder="Enter user name"
                                   type="text"
                                   name="user_name"
                                   required
                            >
                            <p class="help-block" v-if="errors.name">
                                {{ errors.name[0] }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" :class="{'has-error': errors.email }">
                            <label for="user_email">Email</label>
                            <input class="form-control"
                                   v-model.trim="email"
                                   id="user_email"
                                   name="user_email"
                                   placeholder="Enter email"
                                   type="email"
                                   required
                            >
                            <p class="help-block" v-if="errors.email">
                                {{ errors.email[0] }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" :class="{'has-error': errors.email }">
                            <label for="user_email_confirmation">Retype email</label>
                            <input class="form-control"
                                   v-model.trim="emailConfirmation"
                                   id="user_email_confirmation"
                                   name="user_email_confirmation"
                                   placeholder="Email confirmation"
                                   type="email"
                                   required
                            >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>-</label>
                            <button type="submit" class="btn btn-primary btn-block" :disabled="isLoading || !isFormFilled">
                                <span v-if="!isLoading">
                                    <i class="fa fa-user"></i> Create user
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
                email: "",
                emailConfirmation: "",

                errors: {},

                isLoading: false
            }
        },

        computed: {
            isFormFilled() {
                return (this.name.length > 0) && (this.email.length > 0) && (this.emailConfirmation.length > 0);
            }
        },

        methods: {
            onSubmit() {
                let url = laroute.route('rbac::users.store');

                let dataToSend = {
                    name: this.name,
                    email: this.email,
                    email_confirmation: this.emailConfirmation
                };

                this.isLoading = true;
                this.$http.post(url, dataToSend).then(response => {
                    toastr.success(response.data.message);

                    this.$store.state.eventBus.$emit('rbac::user-was-created', response.data.user);
                    this.clearForm();

                    this.isLoading = false;
                }, response => {
                    toastr.error('Please be careful!');

                    this.errors = response.data;
                    this.isLoading = false;
                });
            },

            clearForm() {
                this.errors = {};
                this.name = this.email = this.emailConfirmation = "";
            }
        }
    }
</script>
