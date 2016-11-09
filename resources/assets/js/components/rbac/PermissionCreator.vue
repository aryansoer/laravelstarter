<template>
    <div class="box" :class="['box-' + boxType]">
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
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>-</label>
                            <button type="submit" class="btn btn-block" :class="['btn-' + boxType]" :disabled="isLoading || !isFormFilled">
                                <span v-if="!isLoading">
                                    <i class="fa fa-plus"></i> Create permission
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

    import RolePerm from './mixins/RolePerm.vue';

    export default {

        mixins: [RolePerm],

        props: {
            boxType: {
                type: String,
                default: 'default'
            }
        },

        methods: {
            getStoreURL() {
                return laroute.route('rbac::permissions.store');
            },

            emitCreationEvent(freshObject) {
                this.$store.state.eventBus.$emit('rbac::permission-was-created', freshObject.permission);
            }
        }
    }
</script>
