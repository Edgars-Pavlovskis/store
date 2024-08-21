<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Orders;

class ClientNewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $total;
    public $tax;
    public $totalWitoutTax;
    /**
     * Create a new message instance.
     */
    public function __construct($key)
    {
        $this->order = Orders::where('key', $key)->first();
        if(!isset($this->order->cart)) return;
        $this->total = array_reduce($this->order->cart, function($carry, $product) {
            return $carry + ($product['price'] * intval($product['addCount']));
        }, 0);
        $this->tax = number_format($this->total * 0.21, 2);
        $this->totalWitoutTax = number_format($this->total - $this->tax, 2);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('info@birojamunskolai.lv', 'Birojam un Skolai'),
            subject: 'Pasūtījuma apstiprinājums',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.client.neworder',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
