<?php

namespace App\Notifications;

use App\Drdrapprover;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DrdrapproverToDrdrformFailedNotification extends Notification
{
    use Queueable;

    protected $drdrapprover;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Drdrapprover $drdrapprover)
    {
        $this->drdrapprover = $drdrapprover;
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
                    ->subject('Document Review & Document Request: Disapproved')
                    ->greeting('Good day!')
                    ->line($this->drdrapprover->name.' has disapproved your request.')
                    ->line('Remarks: '.$this->drdrapprover->remarks)
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
