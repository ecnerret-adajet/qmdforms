<?php

namespace App\Notifications;

use App\Ddrapprover;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DdrformApprovedFailedNotification extends Notification
{
    use Queueable;

    protected $ddrapprover;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ddrapprover $ddrapprover)
    {
        $this->ddrapprover = $ddrapprover;
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
                    ->subject('Document Distribution Request: Deny!')
                    ->greeting('Good day!')
                    ->line($this->ddrapprover->name.' has denied your missing authorization form.')
                    ->line('Remarks: '.$this->ddrapprover->remarks)
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
