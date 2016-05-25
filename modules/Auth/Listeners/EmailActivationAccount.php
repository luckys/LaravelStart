<?php

namespace Modules\Auth\Listeners;

use Modules\Auth\Events\UserWasRegistered;
use Modules\Auth\Traits\UserHelper;


class EmailActivationAccount
{
    use UserHelper;

    
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasRegistered  $event
     * @return void
     */
    public function handle(UserWasRegistered $event)
    {
        $this->sendEmail($event->user);
    }
}
