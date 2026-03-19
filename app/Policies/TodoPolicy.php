<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TodoPolicy
{
    /**
     * Determine whether the user owns the model.
     */
    private function isOwner(User $user, Todo $todo): bool
    {
        return $user->is($todo->user);
    }

    /**
     * Determine whether the user can complete the model.
     */
    public function complete(User $user, Todo $todo): bool
    {
        return $this->isOwner($user, $todo);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Todo $todo): Response
    {
        return $this->isOwner($user, $todo)
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Todo $todo): bool
    {
        return $this->isOwner($user, $todo);
    }
}
