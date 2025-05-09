<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->status === 'user';
    }

    public function view(User $user, Project $project)
    {
        return $user->status === 'user';
    }

    public function create(User $user)
    {
        return $user->status === 'user';
    }

    public function update(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    public function delete(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }
}