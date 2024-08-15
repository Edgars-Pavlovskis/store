<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;

class LoadClientDiscountsConfig
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;
        $discountSettings = config('discounts.list.' . $user->discount, []);

        if(!empty($discountSettings) && isset($discountSettings['categories']) && !empty($discountSettings['categories'])) {
            Session::put('user.discounts', $discountSettings['categories']);
        } else {
            Session::put('user.discounts', []);
        }
    }
}
