<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ActivityPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Activity $activity): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isPic();
    }

    public function update(User $user, Activity $activity): bool
    {
        return $user->isPic();
    }

    public function delete(User $user, Activity $activity): bool
    {
        return $user->isPic();
    }

    public function restore(User $user, Activity $activity): bool
    {
        return $user->isPic();
    }

    public function forceDelete(User $user, Activity $activity): bool
    {
        return $user->isPic();
    }
}
