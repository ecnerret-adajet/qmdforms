<?php

namespace App\Notifications;

use App\Ncnapprover;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NcnapproverToNotifiedFailNotification extends Notification
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
               ->subject('Non-conformance Notificatoin: Deny!')
                    ->greeting('Good day!')
                    ->line($this->ncnapprover->name.' has denied your document request form.')
                    ->line('Remarks: '.$this->ncnapprover->remarks)
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
