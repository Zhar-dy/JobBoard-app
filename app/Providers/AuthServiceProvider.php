<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\JobPolicy;
use App\Models\JobPost;
use App\Models\JobApplication;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        JobPost::class => JobPolicy::class,
        JobApplication::class => JobPolicy::class,
        
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    }
}
