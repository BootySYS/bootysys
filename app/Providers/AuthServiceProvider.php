<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('create-module', function($user) {
            return ($user->role === 'university');
        });

        $gate->define('edit-or-delete-module', function($user, $module) {
            return ($user->role === 'university') && ($module->university->id === $user->university->id);
        });

        $gate->define('manage-university', function($user) {
            return $user->role === 'university';
        });

        $gate->define('is-professor', function($user){
            return $user->role === 'professor';
        });

        $gate->define('is-student', function($user) {
            return $user->role === 'student';
        });

        $gate->define('manage-this-team', function($user, $team) {

            $lead = null;

            foreach ($team->members as $member) {
                if ($member->pivot->role === 'leader') {
                    $lead = $member;
                }
            }

            return $lead && ($lead->email === $user->email);
        });
    }
}