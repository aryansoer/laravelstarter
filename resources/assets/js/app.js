
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


/**
 * Second we will define our centralized store. The common state for our components.
 */
const store = new Vuex.Store({
    state: {
        count: 0,
        eventBus: new Vue({})
    },

    mutations: {
        increment (state) {
            state.count++
        }
    }
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('roles-list', require('./components/rbac/RolesList.vue'));
Vue.component('role-creator', require('./components/rbac/RoleCreator.vue'));
Vue.component('roles-permissions-board', require('./components/rbac/RolesPermissionsBoard.vue'));
Vue.component('users-roles-board', require('./components/rbac/UsersRolesBoard.vue'));
Vue.component('user-creator', require('./components/rbac/UserCreator.vue'));
Vue.component('permission-creator', require('./components/rbac/PermissionCreator.vue'));

const app = new Vue({
    el: '#app',

    // this will inject the store instance to all child components.
    store
});
