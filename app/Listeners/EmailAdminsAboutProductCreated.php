<?php

namespace App\Listeners;

use App\Events\ProductCreated as ProductCreatedEvent;
use App\Mail\ProductCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailAdminsAboutProductCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(

    )
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ProductCreatedEvent $event)
    {
        $users = User::all();

        foreach($users as $index => $user){
            if($user->isAdmin()){

                $mail = new ProductCreated(
                    $event->product_id,
                    $event->product_name,
                    $event->product_flavor,
                    $event->product_price,
                );
                $when = now()->addSeconds($index * 5);
                Mail::to($user)->later($when,$mail);
            }
        }
    }
}
