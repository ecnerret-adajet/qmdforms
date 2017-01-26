<?php

namespace App\Notifications;

use App\Ccirform;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CcirformToMrNotification extends Notification
{
    use Queueable;

    protected $ccirform;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ccirform $ccirform)
    {
        $this->ccirform = $ccirform;
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
                    ->subject('Customer Complaint Information Report')
                    ->greeting('Good day!')
                    ->line($this->ccirform->name.' Has submitted a document request under your approval')
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
