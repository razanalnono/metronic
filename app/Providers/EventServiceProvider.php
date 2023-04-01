<?php

namespace App\Providers;

use App\Events\AddProductEvent;
use App\Events\OrderCreated;
use App\Events\QuantityAdded;
use App\Listeners\AddQunatity;
use App\Listeners\AddToStock;
use App\Listeners\ReduceQuantity;
use App\Models\Order;
use App\Notifications\AddProduct;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    public $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderCreated::class => [
         //   ReduceQuantity::class,
            AddToStock::class,
        ],
        QuantityAdded::class =>[
            AddQunatity::class,
        ],
    
        
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // Event::listen(
        //     OrderCreated::class =>
        //     [ReduceQuantity::class,'handle'],
        // );


        Event::listen(
            OrderCreated::class,
           [AddToStock::class, 'handle']
       );

    }
}