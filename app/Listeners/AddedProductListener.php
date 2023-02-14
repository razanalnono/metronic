<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\AddProductEvent;
use App\Notifications\AddProduct;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddedProductListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AddProductEvent $event)
    {
        //
        $product = $event->product;

        $user = User::auth()->first();
        if ($user) {
            $user->notify(new AddProduct($product));
        }
    }
}