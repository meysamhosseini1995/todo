<?php

namespace App\Observers;

use App\Events\TodoUpdated;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoObserver
{
    /**
     *
     * Handle the academy "created" event.
     *
     * @param  Todo  $todo
     * @return void
     */
    public function saving(Todo $todo): void
    {
        $todo->user_id = Auth::id();
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(Todo $todo): void
    {
        event(new TodoUpdated($todo));
    }
}
