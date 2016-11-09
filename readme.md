# Laravel Starter

Laravel Starter is Laravel framework with some initial configuration for [RBAC](https://en.wikipedia.org/wiki/Role-based_access_control) (Role Based Access Control). In FrontEnd, Starter includes compiled RBAC components ([Vue.js](https://vuejs.org)).

## Installation
1. `git clone https://github.com/isaevbehruz/laravelstarter lapp`
2. `cd /lapp && composer install`
3. `cp .env.example .env`
4. `php artisan key:generate`
5. set up your database configuration at _.env_ file
6. Laravel file and database cache drivers doesn't support tags. (Cache tags it's [Zizaco/entrust](https://github.com/Zizaco/entrust) requirments). Therefore change CACHE_DRIVER (=array or another cache tools) at _.env_
7. `php artisan migrate`
8. `php artisan db:seed --class=RolesTableSeeder`
9. `npm install`

![Screenshot 1](/pc1.PNG?raw=true "RBAC")

![Screenshot 2](/pc2.PNG?raw=true "RBAC")

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
