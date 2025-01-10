<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Grant; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Admin gate
        Gate::define('isAdmin', function ($user) {
            return $user->userCategory === 'admin';
        });

        // Staff gate
        Gate::define('isStaff', function ($user) {
            return $user->userCategory === 'staff';
        });

        // Academician gate
        Gate::define('isAcademician', function ($user) {
            return $user->userCategory === 'academician';
        });

        // Admin and Staff combined gate
        Gate::define('AdminStaff', function ($user) {
            return $user->userCategory === 'admin' || $user->userCategory === 'staff';
        });

        // Admin, Academician, and Staff combined gate
        Gate::define('AdminAcademicianStaff', function ($user) {
            return $user->userCategory === 'admin' || $user->userCategory === 'staff' || $user->userCategory === 'academician';
        });

        // Define the isLeader gate properly
        Gate::define('isLeader', function ($user, Grant $grant) {
            // Check if the logged-in user is the leader for the given grant
            return $grant->academicians()
                         ->wherePivot('role', 'leader') // Check if the user's role in the pivot table is 'leader'
                         ->wherePivot('academician_id', $user->id) // Check if the user is the leader
                         ->exists(); // Return true if the user is the leader
        });

        /*Gate::define('isMember', function ($user, $grant) {
            return $grant -> academicians()->wherePivot(academician_id, $user->academician_id)->exists();
        });

        Gate::define('isLeader', function ($user, $grant) {
            return $grant -> leader_id == $user -> academician_id;
        });
        
        Gate::define('isLeader', function ($user, $grant) {
            return $grant->leader_id == $user->id;
        });*/

    }
}
