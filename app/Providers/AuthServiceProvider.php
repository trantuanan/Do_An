<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('Q1_1', function($user){
            $id = $user->role_id;
            $db = Role::select('Q1_1')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q1_1 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q1_2', function($user){
            $id = $user->role_id;
            $db = Role::select('Q1_2')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q1_2 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q1_3', function($user){
            $id = $user->role_id;
            $db = Role::select('Q1_3')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q1_3 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q1_4', function($user){
            $id = $user->role_id;
            $db = Role::select('Q1_4')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q1_4 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q2_1', function($user){
            $id = $user->role_id;
            $db = Role::select('Q2_1')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q2_1 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q2_2', function($user){
            $id = $user->role_id;
            $db = Role::select('Q2_2')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q2_2 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q2_3', function($user){
            $id = $user->role_id;
            $db = Role::select('Q2_3')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q2_3 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q2_4', function($user){
            $id = $user->role_id;
            $db = Role::select('Q2_4')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q2_4 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q2_5', function($user){
            $id = $user->role_id;
            $db = Role::select('Q2_5')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q2_5 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q3_1', function($user){
            $id = $user->role_id;
            $db = Role::select('Q3_1')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q3_1 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q3_2', function($user){
            $id = $user->role_id;
            $db = Role::select('Q3_2')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q3_2 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q3_3', function($user){
            $id = $user->role_id;
            $db = Role::select('Q3_3')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q3_3 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q3_4', function($user){
            $id = $user->role_id;
            $db = Role::select('Q3_4')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q3_4 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q4_1', function($user){
            $id = $user->role_id;
            $db = Role::select('Q4_1')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q4_1 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q4_2', function($user){
            $id = $user->role_id;
            $db = Role::select('Q4_2')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q4_2 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q4_3', function($user){
            $id = $user->role_id;
            $db = Role::select('Q4_3')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q4_3 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q4_4', function($user){
            $id = $user->role_id;
            $db = Role::select('Q4_4')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q4_4 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q4_5', function($user){
            $id = $user->role_id;
            $db = Role::select('Q4_5')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q4_5 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q5_1', function($user){
            $id = $user->role_id;
            $db = Role::select('Q5_1')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q5_1 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q5_2', function($user){
            $id = $user->role_id;
            $db = Role::select('Q5_2')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q5_2 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q5_3', function($user){
            $id = $user->role_id;
            $db = Role::select('Q5_3')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q5_3 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q6_1', function($user){
            $id = $user->role_id;
            $db = Role::select('Q6_1')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q6_1 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q6_2', function($user){
            $id = $user->role_id;
            $db = Role::select('Q6_2')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q6_2 == 1 ) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('Q6_3', function($user){
            $id = $user->role_id;
            $db = Role::select('Q6_3')->where('id',$id)->get();
            foreach ($db as $value) {
                if ($value->Q6_3 == 1 ) {
                    return true;
                }
            }
            return false;
        });
    }
}
