<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * [destroy description]
     * @param  User   $user [description]
     * @param  Task   $task [description]
     * @return [type]       [description]
     */
    public function destroy(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
