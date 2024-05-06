<?php

namespace App\Providers;

use App\Constants\ActivityStatus;
use App\Models\Activity;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (auth()->check()) {
                $user = auth()->user();

                $activityCount = 0;

                if ($user->isAdmin()) {
                    $activityCount = Activity::where('status', ActivityStatus::PENDING)->count();
                } elseif ($user->isPic()) {
                    $activityCount = Activity::where('status', ActivityStatus::CONFIRMED)->count();
                }

                $view->with('activityCount', $activityCount);
            }

            $setting = Setting::where('id', 1)->first();
            $view->with('setting', $setting);
        });
    }
}
