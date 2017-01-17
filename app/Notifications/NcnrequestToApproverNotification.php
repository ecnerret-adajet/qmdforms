<?php

namespace App\Notifications;

use App\Ncnform;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NcnrequestToApproverNotification extends Notification
{
    use Queueable;

    protected $ncnform;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ncnform $ncnform)
    {
        $this->ncnform = $ncnform;
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
                    ->subject('Non-conformance notification.')
                    ->greeting('Good day!')
                    ->line($this->ncnform->issuer.' has submitted a missing authorization under your approval')
                    ->action('Visit the portal now')
                    ->line('Thank you for using our application!');
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
