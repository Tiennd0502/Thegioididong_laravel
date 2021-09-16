<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
// use App\Policies\PagePolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // dashboard
        Gate::define('list-dashboard', 'App\Policies\DashboardPolicy@view');
        Gate::define('add-dashboard', 'App\Policies\DashboardPolicy@create');
        Gate::define('show-dashboard', 'App\Policies\DashboardPolicy@show');
        Gate::define('copy-dashboard', 'App\Policies\DashboardPolicy@copy');
        Gate::define('edit-dashboard', 'App\Policies\DashboardPolicy@update');
        Gate::define('delete-dashboard', 'App\Policies\DashboardPolicy@delete');
        // page
        Gate::define('list-page', 'App\Policies\PagePolicy@view');
        Gate::define('add-page', 'App\Policies\PagePolicy@create');
        Gate::define('show-page', 'App\Policies\PagePolicy@show');
        Gate::define('copy-page', 'App\Policies\PagePolicy@copy');
        Gate::define('edit-page', 'App\Policies\PagePolicy@update');
        Gate::define('delete-page', 'App\Policies\PagePolicy@delete');
        // slider
        Gate::define('list-slider', 'App\Policies\SliderPolicy@view');
        Gate::define('add-slider', 'App\Policies\SliderPolicy@create');
        Gate::define('show-slider', 'App\Policies\SliderPolicy@show');
        Gate::define('copy-slider', 'App\Policies\SliderPolicy@copy');
        Gate::define('edit-slider', 'App\Policies\SliderPolicy@update');
        Gate::define('delete-slider', 'App\Policies\SliderPolicy@delete');
        // category
        Gate::define('list-category', 'App\Policies\CategoryPolicy@view');
        Gate::define('add-category', 'App\Policies\CategoryPolicy@create');
        Gate::define('show-category', 'App\Policies\CategoryPolicy@show');
        Gate::define('copy-category', 'App\Policies\CategoryPolicy@copy');
        Gate::define('edit-category', 'App\Policies\CategoryPolicy@update');
        Gate::define('delete-category', 'App\Policies\CategoryPolicy@delete');
        // brand
        Gate::define('list-brand', 'App\Policies\BrandPolicy@view');
        Gate::define('add-brand', 'App\Policies\BrandPolicy@create');
        Gate::define('show-brand', 'App\Policies\BrandPolicy@show');
        Gate::define('copy-brand', 'App\Policies\BrandPolicy@copy');
        Gate::define('edit-brand', 'App\Policies\BrandPolicy@update');
        Gate::define('delete-brand', 'App\Policies\BrandPolicy@delete');
        // parameter
        Gate::define('list-parameter', 'App\Policies\ParameterPolicy@view');
        Gate::define('add-parameter', 'App\Policies\ParameterPolicy@create');
        Gate::define('show-parameter', 'App\Policies\ParameterPolicy@show');
        Gate::define('copy-parameter', 'App\Policies\ParameterPolicy@copy');
        Gate::define('edit-parameter', 'App\Policies\ParameterPolicy@update');
        Gate::define('delete-parameter', 'App\Policies\ParameterPolicy@delete');
        // product
        Gate::define('list-product', 'App\Policies\ProductPolicy@view');
        Gate::define('add-product', 'App\Policies\ProductPolicy@create');
        Gate::define('show-product', 'App\Policies\ProductPolicy@show');
        Gate::define('copy-product', 'App\Policies\ProductPolicy@copy');
        Gate::define('edit-product', 'App\Policies\ProductPolicy@update');
        Gate::define('delete-product', 'App\Policies\ProductPolicy@delete');
        // evaluate
        Gate::define('list-evaluate', 'App\Policies\EvaluatePolicy@view');
        Gate::define('add-evaluate', 'App\Policies\EvaluatePolicy@create');
        Gate::define('show-evaluate', 'App\Policies\EvaluatePolicy@show');
        Gate::define('copy-evaluate', 'App\Policies\EvaluatePolicy@copy');
        Gate::define('edit-evaluate', 'App\Policies\EvaluatePolicy@update');
        Gate::define('delete-evaluate', 'App\Policies\EvaluatePolicy@delete');
        // post
        Gate::define('list-post', 'App\Policies\PostPolicy@view');
        Gate::define('add-post', 'App\Policies\PostPolicy@create');
        Gate::define('show-post', 'App\Policies\PostPolicy@show');
        Gate::define('copy-post', 'App\Policies\PostPolicy@copy');
        Gate::define('edit-post', 'App\Policies\PostPolicy@update');
        Gate::define('delete-post', 'App\Policies\PostPolicy@delete');
        // customer
        Gate::define('list-customer', 'App\Policies\CustomerPolicy@view');
        Gate::define('add-customer', 'App\Policies\CustomerPolicy@create');
        Gate::define('show-customer', 'App\Policies\CustomerPolicy@show');
        Gate::define('copy-customer', 'App\Policies\CustomerPolicy@copy');
        Gate::define('edit-customer', 'App\Policies\CustomerPolicy@update');
        Gate::define('delete-customer', 'App\Policies\CustomerPolicy@delete');
        // order
        Gate::define('list-order', 'App\Policies\OrderPolicy@view');
        Gate::define('add-order', 'App\Policies\OrderPolicy@create');
        Gate::define('show-order', 'App\Policies\OrderPolicy@show');
        Gate::define('copy-order', 'App\Policies\OrderPolicy@copy');
        Gate::define('edit-order', 'App\Policies\OrderPolicy@update');
        Gate::define('delete-order', 'App\Policies\OrderPolicy@delete');
        // permission
        Gate::define('list-permission', 'App\Policies\PermissionPolicy@view');
        Gate::define('add-permission', 'App\Policies\PermissionPolicy@create');
        Gate::define('show-permission', 'App\Policies\PermissionPolicy@show');
        Gate::define('copy-permission', 'App\Policies\PermissionPolicy@copy');
        Gate::define('edit-permission', 'App\Policies\PermissionPolicy@update');
        Gate::define('delete-permission', 'App\Policies\PermissionPolicy@delete');
        // role
        Gate::define('list-role', 'App\Policies\RolePolicy@view');
        Gate::define('add-role', 'App\Policies\RolePolicy@create');
        Gate::define('show-role', 'App\Policies\RolePolicy@show');
        Gate::define('copy-role', 'App\Policies\RolePolicy@copy');
        Gate::define('edit-role', 'App\Policies\RolePolicy@update');
        Gate::define('delete-role', 'App\Policies\RolePolicy@delete');
        // user
        Gate::define('list-user', 'App\Policies\UserPolicy@view');
        Gate::define('add-user', 'App\Policies\UserPolicy@create');
        Gate::define('show-user', 'App\Policies\UserPolicy@show');
        Gate::define('copy-user', 'App\Policies\UserPolicy@copy');
        Gate::define('edit-user', 'App\Policies\UserPolicy@update');
        Gate::define('delete-user', 'App\Policies\UserPolicy@delete');
    }
}
