<?php

namespace Modules\Auth\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Modules\Auth\Entities\User;

class UserWasRegistered extends Event
{
    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
