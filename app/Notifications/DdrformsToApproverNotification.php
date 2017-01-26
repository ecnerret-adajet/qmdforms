<?php

namespace App\Notifications;

use App\Ddrform;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DdrformsToApproverNotification extends Notification
{
    use Queueable;

    protected $ddrform;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ddrform $ddrform)
    {
        $this->ddrform = $ddrform;
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
                    ->subject('Document Distribution Request')
                    ->greeting('Good day!')
                    ->line($this->ddrform->name.' has submitted a document request under your approval')
                    ->action('Visit the portal now',  url('/ddrforms/approver/create/'.$this->ddrform->id))
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
