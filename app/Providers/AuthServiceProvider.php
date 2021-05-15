<?php

namespace App\Providers;

use App\Services\PermissionGateAndPolicyAccess;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Product;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $permissinGateAndPolicy = new PermissionGateAndPolicyAccess();
        $permissinGateAndPolicy->setGateAndPolicyAccess();

        Gate::define('product-edit', function($user, $id) {
            $product = Product::find($id);
            if ($user->checkPermissionAccess('product_edit') && $user->id === $product->user_id) {
                return true;
            }
            return false;
        });

    }
}
