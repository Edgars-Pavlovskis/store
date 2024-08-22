<?php

namespace App\Jobs;

use App\Models\Orders;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\AdminNewOrder;
use App\Mail\ClientNewOrder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;

class SendOrderEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     */
    public function __construct(Orders $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('info@birojamunskolai.lv')->send(new AdminNewOrder($this->order->key));
        Mail::to($this->order->email)->send(new ClientNewOrder($this->order->key));
    }
}
