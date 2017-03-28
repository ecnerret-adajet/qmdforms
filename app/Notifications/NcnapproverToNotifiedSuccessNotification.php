<?php

namespace App\Notifications;

use App\Ncnapprover;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NcnapproverToNotifiedSuccessNotification extends Notification
{
    use Queueable;

    protected $ncnapprover;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ncnapprover $ncnapprover)
    {
        $this->ncnapprover = $ncnapprover;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->success()
                    ->subject('Non-conformance Notification')
                    ->greeting('Good day!')
                    ->line($this->ncnapprover->name.' has submitted a Non-conformance notification. Please provide necessary immediate action.')
                     ->action('Visit the portal now',  url('/ncnforms/notified/create/'.$this->ncnapprover->ncnform->id))
                    ->line('Thank you, have a nice day!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
