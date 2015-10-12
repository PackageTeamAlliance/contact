<?php

namespace Pta\Contact\Handlers\Events;

use Pta\Contact\Models\Message;
use Illuminate\Contracts\Mail\Mailer;

/**
* Event Handler for contact form submissions
*/
class EventHandler
{
    private $config;
    private $mail;

    public function __construct(Mailer $mail)
    {
        $this->config = config('contact');
        $this->mail = $mail;
    }


    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen('pta.contact.created',  __CLASS__ . '@handle');
    }

     /**
     * {@inheritDoc}
     */
    public function handle(Message $contact)
    {
        if (! $this->config['send_message']) {
            return;
        }

        $this->mail->queue('pta/contact::frontend.contact_email', [], function ($message) use ($contact) {
            $message->sender('yazjallad@gmail.com', "Yaz");
            $message->to($contact->email, $contact->first_name);
        });
    }
}
